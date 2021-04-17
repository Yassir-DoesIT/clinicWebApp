<?php



class User{
    protected $pdo;
    protected $user_id;
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
    protected $lieuTravaille;
    protected $photoProfile;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function signUpUser($nom, $prenom, $cin, $dateNaissance, $sexe, $email, $password, $role, $photoProfile,$specialite=null, $justificatif=null, $lieuTravaille=null){
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
            $this->lieuTravaille=$lieuTravaille;
            $this->photoProfile=$photoProfile;

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
                    $sql="insert into utilisateurs(ROLE, EMAIL, PASSWORD, CIN, NOM, PRENOM, DATE_NAISSANCE, SEXE, ESTVERIFIER, SPECIALITE, JUSTIFICATIF,LIEUTRAVAILLE, PHOTOPROFILE) values(:role, :email, :hashedPassword, :cin, :nom, :prenom,:dateNaissance, :sexe, :estVerifier, :specialite, :justificatif,:lieuTravaille, :photoProfile)";
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
                    $sign_up_stmt->bindValue(':lieuTravaille', $this->lieuTravaille);
                    $sign_up_stmt->bindValue(':photoProfile', $this->photoProfile);
                    if ($this->role=='d') {
                       $sign_up_stmt->bindValue(':estVerifier', 0); 
                    }else{
                       $sign_up_stmt->bindValue(':estVerifier', 1); 
                    }
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
                        'prenom'=>$emailFound['PRENOM'],
                        'dateNaissance'=>$emailFound['DATE_NAISSANCE'],
                        'sexe'=>$emailFound['SEXE'],
                        'photoProfile'=>$emailFound['PHOTOPROFILE'],
                        'cin'=>$emailFound['CIN'],
                        'password'=>$emailFound['PASSWORD'],
                        'specialite'=>$emailFound['SPECIALITE'],
                        'estVerifier'=>$emailFound['ESTVERIFIER'],
                        'justificatif'=>$emailFound['JUSTIFICATIF'],
                        'lieuTravaille'=>$emailFound['LIEUTRAVAILLE']
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
    public function updateUser($nom, $prenom, $cin, $dateNaissance, $sexe, $email, $password, $role ,$specialite=null, $lieuTravaille=null){
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
            $this->lieuTravaille=$lieuTravaille;

                //check if email or cin already exist
                if ($this->email!==$_SESSION['email'] ) {
                    $checkEmail=$this->pdo->prepare("select * from utilisateurs where lower(EMAIL)=:email and ROLE=:role");
                    $checkEmail->bindValue(':email', $this->email);
                    $checkEmail->bindValue(':role', $this->role);
                    $checkEmail->execute();
                    if($checkEmail->rowcount()>0){
                    return ['errorMessage'=>'Email already exists'];}
                }
                if($this->cin!==$_SESSION['cin']){

                    $checkCin=$this->pdo->prepare("select * from utilisateurs where lower(CIN)=:cin and ROLE=:role");
                    $checkCin->bindValue(':cin', $this->cin);
                    $checkCin->bindValue(':role', $this->role);
                    $checkCin->execute();
                    
                    if($checkCin->rowcount()>0){
                        return ['errorMessage'=> 'CIN already exists'];}

                }
                if (empty($this->password)) {
                        $this->hashedPassword=$_SESSION['password'];
                        }else{
                        $this->hashedPassword=password_hash($this->password, PASSWORD_DEFAULT);
                        }
                    $_SESSION['email']=$this->email;
                    $_SESSION['nom']=$this->nom;
                    $_SESSION['prenom']=$this->prenom;
                    $_SESSION['dateNaissance']=$this->dateNaissance;
                    $_SESSION['sexe']=$this->sexe;
                    $_SESSION['cin']=$this->cin;
                    $_SESSION['password']=$this->hashedPassword;
                    $_SESSION['specialite']=$this->specialite;
                    $_SESSION['lieuTravaille']=$this->lieuTravaille;
                    
                    $sql="update utilisateurs set ROLE=:role, EMAIL=:email, PASSWORD=:hashedPassword, CIN=:cin, NOM=:nom, PRENOM=:prenom, DATE_NAISSANCE=:dateNaissance, SEXE=:sexe, SPECIALITE=:specialite ,LIEUTRAVAILLE=:lieuTravaille where id_user=:user_id";
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
                    $sign_up_stmt->bindValue(':lieuTravaille', $this->lieuTravaille);
                    $sign_up_stmt->bindValue(':user_id', $_SESSION['user_id']);
                    $sign_up_stmt->execute();

                    
                    // header('location: patient');
                    return ['successMessage'=>'Success'];
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    function updatePicture($user_id, $photoProfile){
        try {
            $this->user_id=$user_id;
            $this->photoProfile=$photoProfile;
            $statement=$this->pdo->prepare("update utilisateurs set PHOTOPROFILE=:photoProfile where id_user=:user_id ");
            $statement->bindValue(':photoProfile', $this->photoProfile);
            $statement->bindValue(':user_id', $this->user_id);
            $statement->execute();
            return ['successMessage'=>'Profile picture changed successfully'];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}