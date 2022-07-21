<?php
require_once '../../fichierCommun/db.class.php';
class CRUDClass extends dbConnection
{




    public function __construct()
    {
        parent::PDOConnection();
    }

    public function addClass($nom, $subject, $teacher)
    {

        $idAdmin = $_SESSION['id'];
        $statement = $this->dbc->prepare("INSERT INTO class(nom,matiere,idProf,idAdmin)VALUES(:nom,:matiere,:idProf,:idAdmin)");
        $statement->execute([

            "nom" => $nom,
            "matiere" => $subject,
            "idProf" => $teacher,
            "idAdmin" => $idAdmin


        ]);
        parent::close();
    }

    public function readClass()
    {

        $sql = "select * from class";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();
        return $res;
    }
    public function readClassById($idClass)
    {
        $sql = "select * from class where id =" . $idClass . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        parent::close();
        foreach ($res as $r) {
            return $r;
        }
    }
    public function updateClass($id, $nom, $matiere, $idProf)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $idAdmin = $_SESSION['id'];
        $statement = $this->dbc->prepare("update class set nom = :nom,matiere= :matiere,idProf= :idProf,idAdmin= :idAdmin where id =:id");
        $statement->execute([
            "nom" => $nom,
            "matiere" => $matiere,
            "idProf" => $idProf,
            "idAdmin" => $idAdmin,
            "id" => $id
        ]);
        parent::close();
    }
    public function deleteClass($idClass)
    {
        $sql  = "delete from affectation where idClass=" . $idClass . "";
        $this->dbc->query($sql);
        $sql = "delete from meet where idClass=" . $idClass . "";
        $this->dbc->query($sql);
        $sql = "delete from lecon where idChapitre in (select id from chapitre where idCours in (select id from cours where idClass = " . $idClass . "))";
        $this->dbc->query($sql);
        $sql = "delete from chapitre where idCours in (select id from cours where idClass = " . $idClass . ")";
        $this->dbc->query($sql);
        $sql = "UPDATE `commentaire` SET `idCommentParent`=NULL WHERE idCours in (SELECT id from cours WHERE idClass = " . $idClass . " )";
        $this->dbc->query($sql);
        $sql = " DELETE from commentaire where idCours in (SELECT id from cours WHERE idClass = ".$idClass.")";
        $this->dbc->query($sql);
         $sql = "delete from cours where idClass=".$idClass."";
         $this->dbc->query($sql);
         $sql = "delete from class where id=".$idClass."";
         $this->dbc->query($sql);
        parent::close();
    }
}
