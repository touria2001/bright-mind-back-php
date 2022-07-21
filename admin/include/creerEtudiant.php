<?php
session_start();
require_once 'autoloadAdmin.php';

if (!empty($_POST)) {


    $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['nom']))));
    $prenom = htmlspecialchars(strip_tags(trim(strtolower($_POST['prenom']))));
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    $password = htmlspecialchars(strip_tags(trim(strtolower($_POST['pw']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(strtolower($_POST['pwVerif']))));
    $cin = htmlspecialchars(strip_tags(trim(strtolower($_POST['cin']))));
    $tel = htmlspecialchars(strip_tags(trim(strtolower($_POST['tel']))));
    $niveauScolaire = htmlspecialchars(strip_tags(trim(strtolower($_POST['niveauScolaire']))));




    $createEtudiant = new creerEtudiant($nom, $prenom, $email, $password, $passwordConf, $cin, $tel,$niveauScolaire);

    $createEtudiant->isEmailExist();
    $createEtudiant->sendEmailToEtudiant();
    $createEtudiant->createEtudiant();

    $errors = $createEtudiant->errors;





    echo json_encode($errors);
}
