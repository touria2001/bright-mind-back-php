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
    $admin = new Profil($nom, $prenom, $email, $password, $passwordConf, $cin, $tel);

    if (!empty($_FILES['avatar'])) {
        $nameFile = $_FILES['avatar']['name'];
        $typeFile = $_FILES['avatar']['type'];
        $sizeFile = $_FILES['avatar']['size'];
        $tmpFile = $_FILES['avatar']['tmp_name'];
        $admin->updatePhoto($nameFile, $typeFile, $sizeFile, $tmpFile);
    }

    if ($admin->errors == null) {
        $admin->updateNom($nom);
        $admin->updatePrenom($prenom);
        $admin->updateCin($cin);
        $admin->updateTel($tel);
        $admin->updateEmail($email);
        $admin->updatePw($password, $passwordConf);
    }
    $errors = $admin->errors;

    echo json_encode($errors);
}
