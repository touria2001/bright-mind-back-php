<?php
require_once '../../fichierCommun/db.class.php';

class Prof extends dbConnection
{
    public function __construct()
    {
        parent::PDOConnection();
    }

    public function yourClass($idProf)
    {
        $sql = "select * from class where idProf =" . $idProf . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function nombreEtudiants($idClass)
    {
        $sql = "select * from affectation where idClass=" . $idClass . "";
        $res = $this->dbc->query($sql);
        return $res->rowCount();
    }

    public function GetCoursByClass($idClass)
    {
        $sql = "select * from cours where idClass =" . $idClass . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function GetChapitreByCours($idCours)
    {
        $sql = "select * from chapitre where idCours =" . $idCours . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
      
        return $res;
    }

    public function GetLeçonByChapitre($idChapitre)
    {
        $sql = "select * from lecon where idChapitre =" . $idChapitre . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
       
        return $res;
    }

    public function getCours()
    {
    $sql = "select * from cours ";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
       
        return $res;
    }

    // public function getChapitre()
    // {
    // $sql = "select * from chapitre ";
    //     $res = $this->dbc->query($sql);
    //     $res->setFetchMode(PDO::FETCH_ASSOC);
       
    //     return $res;
    // }
    // public function getLeçon()
    // {
    //     $sql = "select * from lecon ";
    //     $res = $this->dbc->query($sql);
    //     $res->setFetchMode(PDO::FETCH_ASSOC);
       
    //     return $res;  
    // }
   
    public function ajouterMeet($datedebut,$description,$lien,$idClass)
    {
        $statement = $this->dbc->prepare("INSERT INTO meet(datedebut,description,lien,idClass)VALUES(:datedebut,:description,:lien,:idClass)");
        $statement->execute([
            "datedebut" => $datedebut,
            "description" =>$description ,
            "lien" => $lien,
            "idClass"=> $idClass,
        ]);
       
    }

    public function ajouterCommentaire($contenu, $date,$idCommentParent,$idCours,$idEtudiant)
    {
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCommentParent,idEtudiant,idCours,date)VALUES(:contenu,:idCommentParent,:idEtudiant,:idCours,:date)");
        $statement->execute([
            "contenu" => $contenu,
            "idCommentParent" =>$idCommentParent ,
            "idEtudiant" => $idEtudiant,
            "idCours"=> $idCours,
            "date"=> $date,
        ]);
    }

    public function ajouterCommentaireProf($contenu, $date,$idCommentParent,$idCours)
    {
        $statement = $this->dbc->prepare("INSERT INTO commentaire(contenu,idCommentParent,idCours,date)VALUES(:contenu,:idCommentParent,:idCours,:date)");
        $statement->execute([
            "contenu" => $contenu,
            "idCommentParent" =>$idCommentParent ,
            "idCours"=> $idCours,
            "date"=> $date,
        ]);
    }
    public function comment_child($idComment){
        $sql = "select * from commentaire where idCommentParent=" . $idComment . "";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function commentaires_sans_parent(){
        $sql = "select * from commentaire where idCommentParent IS NULL";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        return $res;
    }

    public function comment_has_child($idComment){
        $sql = "select * from commentaire where idCommentParent=" . $idComment . "";
        $res = $this->dbc->query($sql);
        return $res->rowCount();
    }

    public function supprimerComment($idComment)
    {
        $nbrChild=$this->comment_has_child($idComment);
        if($nbrChild==0){
            $sql  = "delete from commentaire where id=" . $idComment . "";
            $this->dbc->query($sql);
            return 0;
        }
        else{
            $statement = $this->dbc->prepare("update commentaire set contenu = :contenu where id =:id");
            $statement->execute([
                
                "contenu" => 'this message has been deleted',
                "id" => $idComment, 
            ]);
            return 1;
        }
       

    }

    public function modifierComment($idComment,$contenu)
    {
        $statement = $this->dbc->prepare("update commentaire set contenu = :contenu where id =:id");
        $statement->execute([
            
            "contenu" => $contenu,
            "id" => $idComment, 
        ]);
    }
    
    public function supprimerCommentSansFils(){
        $sql = "select * from commentaire where contenu ='this message has been deleted'";
        $res = $this->dbc->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($res as $comment)
         {
            $id=$comment['id'];
            if($this->comment_has_child($id)==0)
            {
                $sql  = "delete from commentaire where id=" . $id . "";
                $this->dbc->query($sql);
            }
         }

    }

    public function ajouterFilesByCours($files)
    {
        $idCours=$this->dbc->lastInsertId();
        foreach($files as $file){
        $statement = $this->dbc->prepare("INSERT INTO file(nom,idCours)VALUES(:nom,:idCours)");
        $statement->execute([
            "nom" => $file,
            "idCours"=> $idCours,
        ]);
    }
    }

    public function ajouterFilesByChapitre($files)
    {
        $idChapitre=$this->dbc->lastInsertId();
        foreach($files as $file){
        $statement = $this->dbc->prepare("INSERT INTO file(nom,idChapitre)VALUES(:nom,:idChapitre)");
        $statement->execute([
            "nom" => $file,
            "idChapitre"=> $idChapitre,
        ]);
    }
   
    }

    public function ajouterFilesByLecon($nom,$idLecon)
    {
        $statement = $this->dbc->prepare("INSERT INTO file(nom,idLecon)VALUES(:nom,:idLecon)");
        $statement->execute([
            "nom" => $nom,
            "idCours"=> $idLecon,
        ]);
    }

  public function ajouterCours($titre,$idClass,$description,$contenu){
    $statement = $this->dbc->prepare("INSERT INTO Cours(titre,idClass,description,contenu)VALUES(:titre,:idClass,:description,:contenu)");
    $statement->execute([
        "titre" => $titre,
        "idClass"=> $idClass,
        "description"=>$description,
        "contenu"=>$contenu,
    ]);
  }


}
