<?php
require_once '../../fichierCommun/db.class.php';

class Admin extends dbConnection
{
    public function __construct()
    {
        parent::PDOConnection();
        
    }
    public function desactiverCompte($id)
    {
        $statement = $this->dbc->prepare("update admin set status = true where id = :id");

        $statement->execute([
            "id" => $id
        ]);
        parent::close();
    }

    public function activerCompte($id)
    {
        $statement = $this->dbc->prepare("update admin set status = false where id = :id");

        $statement->execute([
            "id" => $id
        ]);
        parent::close();
    }

    public function getAdmin($id)
    {
        $sql = "select * from admin where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();

        foreach ($res as $r) {
            return $r;
        }
    }
    public function isSuperviseur()
    {
        $sql = "select * from admin where isSup =1";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();

        foreach ($res as $r) {
            return $r['id'];
        }
    }

    public function desactiverComptePorf($id)
    {
        $statement = $this->dbc->prepare("update professeur set status = true where id = :id");

        $statement->execute([
            "id" => $id
        ]);
        parent::close();
    }

    public function activerCompteProf($id)
    {
        $statement = $this->dbc->prepare("update professeur set status = false where id = :id");

        $statement->execute([
            "id" => $id
        ]);
        parent::close();
    }
    public function demandeEtudiant()
    {
        $sql = "select * from etudiant where acceptePar is null and ajouterPar is null";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();
        return $res;
    }
    public function accepterEtudiant($idEtudiant)
    {
        session_start();
        $idAdmin = $_SESSION['id'];
        $statement = $this->dbc->prepare("update etudiant set acceptePar = :idAdmin where id = :id");

        $statement->execute([
            "idAdmin" => $idAdmin,
            "id" => $idEtudiant
        ]);
        parent::close();
    }

    public function getStudentById($id)
    {
        $sql = "select * from etudiant where id =" . $id . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();

        foreach ($res as $r) {
            return $r;
        }
    }
    public function afficherMatieres()
    {
        parent::PDOConnection();
        $sql = "select DISTINCT matiere from class";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();
        return $res;
    }
    public function afficherNombreMatieres()
    {
        parent::PDOConnection();
        $sql = "select count( DISTINCT matiere) from class";
        $res = $this->dbc->query($sql);
        $count = $res->fetchColumn();
        parent::close();
        return $count;
    }
    public function afficherclassParMatiere($matiere)
    {
        parent::PDOConnection();
        $sql = "select * from class where matiere ='" . $matiere . "'";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();
        return $res;
    }
    public function affecterEtudiant($idEtudiant, $idClass)
    {
        parent::PDOConnection();
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
        $idAdmin =$_SESSION['id'];
        $statement = $this->dbc->prepare("INSERT INTO affectation(idClass,idEtudiant,idAdmin)VALUES(:idClass,:idEtudiant,:idAdmin)");
        $statement->execute([

            "idEtudiant" => $idEtudiant,
            "idClass" => $idClass,
            "idAdmin" => $idAdmin


        ]);
        return 1;
        parent::close();
    }
    public function readStudentByClass($idClass)
    {
    }
}
