<?php
require_once 'autoloadAdmin.php';
if (!empty($_POST)) {

    $nom = htmlspecialchars(strip_tags(trim(strtolower($_POST['name']))));
    $subject = htmlspecialchars(strip_tags(trim(strtolower($_POST['subject']))));
    $teacher = htmlspecialchars(strip_tags(trim(strtolower($_POST['prof']))));

    
    $class = new CreerClass($nom, $subject, $teacher);
    $class->isNomExist();
    $class->createClass();
    $errors = $class->errors;
    echo json_encode($errors);
}
