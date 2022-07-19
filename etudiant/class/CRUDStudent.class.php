<?php 
require_once '../../fichierCommun/db.class.php';
class CRUDStudent extends dbConnection{
	private $nom;
    private $prenom;
    private $email;
    private $pw;
    private $niveauScolaire;
public function __construct()
{
    parent::PDOConnection();
}
    
public  function setNom($nom){
    $this->nom = $nom;
}
public  function setPrenom($prenom){
    $this->prenom = $prenom;
}
public  function setEmail($email){
    $this->email = $email;
}
public  function setPw($pw){
    $this->pw = $pw;
}
public  function setNiveauScolaire($niveauScolaire){
    $this->niveauScolaire = $niveauScolaire;
}







    public function addStudent(){
       
        $statement = $this->dbc->prepare("INSERT INTO etudiant(nom,prenom,email,niveauScolaire,pw)VALUES(:nom,:prenom,:email,:niveauScolaire,:pw)");
        $statement->execute([

            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "email" => $this->email,
            "niveauScolaire" => $this->niveauScolaire,
            "pw" => password_hash($this->pw, PASSWORD_DEFAULT),


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