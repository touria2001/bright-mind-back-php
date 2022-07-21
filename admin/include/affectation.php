<?php
if (!empty($_POST)) {
    require_once '../include/autoloadAdmin.php';
    $admin = new Admin();

    $size = $admin->afficherNombreMatieres();
   
    for ($i = 0; $i < $size; $i++) {

        if ($_POST['subject' . $i] != 0) {
             echo   $admin->affecterEtudiant($_POST['idEtudiant'], $_POST['subject' . $i]);
        }
    }
     $admin  = new Admin();

    $admin->accepterEtudiant($_POST['idEtudiant']);
    header('location:../public/demandeEtudiant.php');
}
