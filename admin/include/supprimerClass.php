<?php
if(!empty($_GET)){
require_once 'autoloadAdmin.php';
$crudClass = new CRUDClass();

$crudClass->deleteClass($_GET['id']);

}