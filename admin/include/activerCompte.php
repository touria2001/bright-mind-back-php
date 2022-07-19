<?php
require 'autoloadAdmin.php';
$admin  = new Admin();
if ($_GET['status'] == 0) {
   
    $admin->desactiverCompte($_GET['id']);
} else {
    $admin->activerCompte($_GET['id']);
}
header('location:../public/afficherAdmins.php');
