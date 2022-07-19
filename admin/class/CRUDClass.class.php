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
}
