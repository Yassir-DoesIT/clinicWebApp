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
    protected $passwordHash;
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
                    $sql="insert into utilisateurs(ROLE, EMAIL, PASSWORD, CIN, NOM, PRENOM, DATE_NAISSANCE, SEXE, ESTVERIFIER, SPECIALITE, JUSTIFICATIF) values(:role, :email, :password, :cin, :nom, :prenom,:dateNaissance, :sexe, 0, :specialite, :justificatif)";
                    $sign_up_stmt=$this->pdo->prepare($sql);
                    $sign_up_stmt->bindValue(':role', $this->role);
                    $sign_up_stmt->bindValue(':email', $this->email);
                    $sign_up_stmt->bindValue(':password', $this->password);
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
}