<?php
require_once 'autoloadAdmin.php';

if (!empty($_POST)) {


    $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['nom']))));
    $prenom = htmlspecialchars(strip_tags(trim(strtolower($_POST['prenom']))));
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    $password = htmlspecialchars(strip_tags(trim(strtolower($_POST['pw']))));
    $passwordConf = htmlspecialchars(strip_tags(trim(strtolower($_POST['pwVerif']))));
    $cin = htmlspecialchars(strip_tags(trim(strtolower($_POST['cin']))));
    $tel = htmlspecialchars(strip_tags(trim(strtolower($_POST['tel']))));




    $createAdmin = new CreerAdmin($nom, $prenom, $email, $password, $passwordConf, $cin, $tel);

    $createAdmin->isEmailExist();
    $createAdmin->sendEmailToAdmin();
    $createAdmin->createAdmin();

    $errors = $createAdmin->errors;





    echo json_encode($errors);
}
