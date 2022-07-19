<?php
require 'autoloadAdmin.php';
$admin  = new Admin();
if ($_GET['status'] == 0) {
   
    $admin->desactiverComptePorf($_GET['id']);
} else {
    $admin->activerCompteProf($_GET['id']);
}
header('location:../public/afficherProfs.php');
