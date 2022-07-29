<?php
session_start();
require_once 'autoloadProf.php';

if (!empty($_POST)) {

    $date = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['date']))));
    $description = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['description']))));
    $lien = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['lien']))));
    $idClass = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['idClass']))));
    // $idProf = $_SESSION['id'];
    $errors = array();
    if (empty($date)) {
        $errors['dateVide'] = "please fill the date field";
    }
    $datenow=new DateTime();
    $now=$datenow->format('Y-m-d H:i:s');
   
   if( !empty($date)){
    $dateFormat = date("Y-m-d H:i:s", strtotime($date));
    if( $now>$dateFormat){
        $errors['dateInvalide'] = "date Invalide";
        
    }
    }

    if (empty($description)) {
        $errors['descriptionVide'] = "please fill the desription field";
    }
    if (empty($lien)) {
        $errors['lienVide'] = "please fill the link field";
    }
 
    if (empty($errors)) {
      
        $prof = new Prof();
        $prof->ajouterMeet($dateFormat, $description, $lien, $idClass);
        $errors = null;
    }

     echo json_encode($errors);
 }
