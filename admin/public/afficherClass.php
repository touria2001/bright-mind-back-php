<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location:connecter.php"); 
 
}
else{
    if($_SESSION['admin']==0){
        header("Location:connecter.php"); 
 
    }

    require_once '../include/autoloadAdmin.php';

$id = $_SESSION['id'];
    
   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php   

$arrayClass = new CRUDClass();?>




 
<table>
    <thead>
        <td>id</td>
        <td>name</td>
        <td>subject</td>
       <td>teacher</td>
       <td>list student</td>
      
    </thead>
    <tbody>
<?php
$prof = new CRUDProf();
  foreach( $arrayClass->readClass() as $class){?>
    <tr>
        <td><?php echo $class['id']; ?></td>
    <td><?php echo $class['nom']; ?></td>
    <td> <?php echo $class['matiere']; ?></td>
    <td><?php  $teacher = $prof->readProfById($class['idProf']);
    echo $teacher['nom']." ".$teacher['prenom']; ?></td>
    <td><a href="afficherEtudiantByClass.php?id=<?php echo $class['id'] ?>">list</a></td>
    <td ><a href="modifierClass.php?id=<?php echo $class['id'] ?>">edit</a></td>
    <td><a href="../include/supprimerClass.php?id=<?php echo $class['id'] ?>">delete</a></td>
   

   
    
    
    </tr>
<?php } ?>
    </tbody>
</table>

</body>

</html>
<?php }?>