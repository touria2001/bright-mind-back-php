<?php
require_once 'autoloadEtudiant.php';
if (!empty($_POST)) {

    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    $password = htmlspecialchars(strip_tags(trim(strtolower($_POST['pw']))));
    $cookie = false;
    if (isset($_POST['souvenir'])) {
        $cookie = true;
    }
    $student = new SignIn($email, $password, $cookie);
    
    $student->checkUser();
    $errors = $student->errors;
    echo json_encode($errors);
}
