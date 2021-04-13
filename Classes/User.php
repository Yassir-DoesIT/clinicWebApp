<?php



class User{
    protected $pdo;
    protected $nom;
    protected $prenom;
    protected $cin;
    protected $dateNaissance;
    protected $sexe;
    protected $email;
    protected $password;
    protected $role;
    protected $numeroTele;
    protected $specialite;
    protected $justificatif;
    protected $hashedPassword;
    protected $age;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function signUpUser($nom, $prenom, $cin, $dateNaissance, $sexe, $email, $password, $role, $specialite=null, $justificatif=null){
        try{
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->cin=$cin;
            $this->dateNaissance=$dateNaissance;
            $this->sexe=$sexe;
            $this->email=$email;
            $this->password=$password;
            $this->role=$role;
            $this->specialite=$specialite;
            $this->justificatif=$justificatif;

                //check if email or cin already exist
                
                $checkEmail=$this->pdo->prepare("select * from utilisateurs where lower(EMAIL)=:email and ROLE=:role");
                $checkEmail->bindValue(':email', $this->email);
                $checkEmail->bindValue(':role', $this->role);
                $checkEmail->execute();
                
                
                $checkCin=$this->pdo->prepare("select * from utilisateurs where lower(CIN)=:cin and ROLE=:role");
                $checkCin->bindValue(':cin', $this->cin);
                $checkCin->bindValue(':role', $this->role);
                $checkCin->execute();
                
                if($checkEmail->rowcount()>0){
                    return ['errorMessage'=>'account already exists'];
                
                }else if($checkCin->rowcount()>0){
                    return ['errorMessage'=> 'CIN already exists'];
                
                }else{
                    $this->hashedPassword=password_hash($this->password, PASSWORD_DEFAULT);
                    $sql="insert into utilisateurs(ROLE, EMAIL, PASSWORD, CIN, NOM, PRENOM, DATE_NAISSANCE, SEXE, ESTVERIFIER, SPECIALITE, JUSTIFICATIF) values(:role, :email, :hashedPassword, :cin, :nom, :prenom,:dateNaissance, :sexe, 0, :specialite, :justificatif)";
                    $sign_up_stmt=$this->pdo->prepare($sql);
                    $sign_up_stmt->bindValue(':role', $this->role);
                    $sign_up_stmt->bindValue(':email', $this->email);
                    $sign_up_stmt->bindValue(':hashedPassword', $this->hashedPassword);
                    $sign_up_stmt->bindValue(':cin', $this->cin);
                    $sign_up_stmt->bindValue(':nom', $this->nom);
                    $sign_up_stmt->bindValue(':prenom', $this->prenom);
                    $sign_up_stmt->bindValue(':dateNaissance', $this->dateNaissance);
                    $sign_up_stmt->bindValue(':sexe', $this->sexe);
                    $sign_up_stmt->bindValue(':specialite', $this->specialite);
                    $sign_up_stmt->bindValue(':justificatif', $this->justificatif);
                    $sign_up_stmt->execute();
                    return ['successMessage'=>'Success'];
                }
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    function logInUser($email, $password, $role){
        try {
            $this->email=$email;
            $this->password=$password;
            $this->role=$role;

            $checkEmail=$this->pdo->prepare("select * from utilisateurs where email=:email and role=:role");
            $checkEmail->bindValue(':email', $this->email);
            $checkEmail->bindValue(':role', $this->role);
            $checkEmail->execute();
             if ($checkEmail->rowcount()===1) {
                
                $emailFound=$checkEmail->fetch(PDO::FETCH_ASSOC);
                $passwordMatch=password_verify($this->password, $emailFound['PASSWORD']);
                if ($passwordMatch) {
                    $firstPart = [
                        'user_id'=>$emailFound['ID_USER'],
                        'email'=>$emailFound['EMAIL'],
                        'isVerified'=>$emailFound['ESTVERIFIER'],
                        'nom'=>$emailFound['NOM'],
                        'prenom'=>$emailFound['PRENOM']
                    ];
                    
                    if($emailFound['ROLE']=='a'){
                        $secondPart = ['role'=>'admin'];
                        $_SESSION = array_merge($firstPart, $secondPart);
                        header('location: admin');
                    }elseif($emailFound['ROLE']=='d'){
                        $secondPart = ['role'=>'doctor'];
                        $_SESSION = array_merge($firstPart, $secondPart);
                        header('location: doctor');
                    }elseif($emailFound['ROLE']=='p'){
                        $secondPart = ['role'=>'patient'];
                        $_SESSION = array_merge($firstPart, $secondPart);
                        header('location: patient');
                    }
                    return ['successMessage'=>'Logged in successfully'];
                }else{
                    return ['errorMessage'=>'Invalid password'];
                }
                
             }else{
                return ['errorMessage'=>'Invalid email address'];
             }

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}