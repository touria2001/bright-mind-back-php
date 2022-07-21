<?php

require_once 'autoloadAdmin.php';
if (!empty($_POST)) {
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    $pw = htmlspecialchars(strip_tags(trim(strtolower($_POST['pw']))));
    $pwVerif = htmlspecialchars(strip_tags(trim(strtolower($_POST['pwVerif']))));

    $oubliePw = new OubliePw($email);

    $oubliePw->updatePw($pw, $pwVerif);



    $errors = $oubliePw->errors;

    echo json_encode($errors);
}
