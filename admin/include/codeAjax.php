<?php

require_once 'autoloadAdmin.php';
if (!empty($_POST)) {
    $email = htmlspecialchars(strip_tags(trim(strtolower($_POST['email']))));
    $code = htmlspecialchars(strip_tags(trim(strtolower($_POST['code']))));
    
    $oubliePw = new OubliePw($email);
 
    $oubliePw->verifierCode($code);
   
    
    
     $errors = $oubliePw->errors;
     $errors['email'] = $email;
    echo json_encode($errors);
}
