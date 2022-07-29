<?php
session_start();
$_SESSION['prof']=0;
require_once 'autoloadProf.php';

if (!empty($_POST)) {
    $contenu = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['contenu']))));
    $errors = array();
    if (empty($contenu)) {
        $errors['commentaireVide'] = "please fill the content field";
    }
    $datenow=new DateTime();
    $date=$datenow->format('Y-m-d H:i:s');
   
 // on doit modifier ca
    $idCommentParent=2;
    $idCours=2;
 
    if (empty($errors)) {
      
        $prof = new Prof();
        if($_SESSION['prof']==0){
        $idetudiant=7;
        $prof->ajouterCommentaire($contenu, $date,$idCommentParent,$idCours,$idetudiant);
        }
        else{
            $prof->ajouterCommentaireProf($contenu, $date,$idCommentParent,$idCours); 
        }
        $errors = null;
    }

    echo json_encode($errors);
 }
