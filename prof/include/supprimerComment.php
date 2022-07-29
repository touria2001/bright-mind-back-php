<?php
require_once 'autoloadProf.php';
$id=$_GET['id'];
$prof = new Prof();
$child=$prof->supprimerComment($id);
echo json_encode($child);

?>