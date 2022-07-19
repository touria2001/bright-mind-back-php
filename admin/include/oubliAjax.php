<?php

require_once 'autoloadAdmin.php';
if (!empty($_POST)) {
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    
    $oubliePw = new OubliePw($email);
    ;
    $oubliePw->mainFunction();
    $errors = $oubliePw->errors;
    echo json_encode($errors);
}
