<?php
require 'autoloadAdmin.php';
if ($_GET['accept'] == 1) {
   
    // $admin  = new Admin();

    // $admin->accepterEtudiant($_GET['id']);
    header('location:../public/affecterEtudiant.php?id='.$_GET["id"].'');
} else {
    
    require_once '../../etudiant/class/CRUDStudent.class.php';
    $admin = new CRUDStudent();
    $admin->deleteStudent($_GET['id']);
    header('location:../public/demandeEtudiant.php');
}
