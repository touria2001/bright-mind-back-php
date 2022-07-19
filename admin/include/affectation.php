<?php
if (!empty($_POST)) {
    require_once '../include/autoloadAdmin.php';
    $admin = new Admin();

    $size = $admin->afficherNombreMatieres();
    for ($i = 0; $i < $size; $i++) {
echo $_POST['subject' . $i];echo '<br>';
       echo  $admin->affecterEtudiant($_POST['idEtudiant'], $_POST['subject' . $i]);
       
    }
}
