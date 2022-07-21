<?php 
require_once '../../fichierCommun/db.class.php';
class CRUDStudent extends dbConnection{
	
    private $email;
    private $pw;
   
public function __construct()
{
    parent::PDOConnection();
}
    

public  function setEmail($email){
    $this->email = $email;
}
public  function setPw($pw){
    $this->pw = $pw;
}





public function signUpStudent($prenom,$nom,$niveauScolaire){
       
    $statement = $this->dbc->prepare("INSERT INTO etudiant(nom,prenom,email,niveauScolaire,pw,)VALUES(:nom,:prenom,:email,:niveauScolaire,:pw)");
    $statement->execute([

        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $this->email,
        "niveauScolaire" => $niveauScolaire,
        "pw" => password_hash($this->pw, PASSWORD_DEFAULT),


    ]);
    parent::close();
}


    public function addStudent($prenom,$nom,$cin,$telephone,$niveauScolaire,$ajouterPar){
       
        $statement = $this->dbc->prepare("INSERT INTO etudiant(nom,prenom,email,niveauScolaire,cin,telephone,pw,ajouterPar)VALUES(:nom,:prenom,:email,:niveauScolaire,:cin,:telephone,:pw,:ajouterPar)");
        $statement->execute([

            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $this->email,
            "niveauScolaire" => $niveauScolaire,
            "cin"=>$cin,
            "telephone" => $telephone,
            "pw" => password_hash($this->pw, PASSWORD_DEFAULT),
            "ajouterPar" => $ajouterPar,


        ]);
        parent::close();
    }
    public function deleteStudent($id){
        $statement = $this->dbc->prepare("delete from etudiant where id = :id");
        $statement->execute([
            
           
            "id" => $id  
        ]);
        parent::close();
    }
    public function readStudent(){
        $sql = "select * from etudiant";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();
        return $res;
    }
    public function updateStudent(){

    }
}