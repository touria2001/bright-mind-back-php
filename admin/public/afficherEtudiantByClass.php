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

$arrayStudent = new Admin();?>




 
<table>
    <thead>
        
        <td>first name</td>
        <td>last name</td>
        <td>email</td>
       <td>school level</td>
    </thead>
    <tbody>
<?php
  foreach( $arrayStudent->readStudentByClass($_GET['id']) as $student){?>
    <tr>
    <td><?php echo $student['prenom']; ?></td>
    <td> <?php echo $student['nom']; ?></td>
    <td><?php echo $student['email'] ;?></td>
    <td><?php echo $student['niveauScolaire']; ?></td>
    

    
    
    </tr>
<?php } ?>
    </tbody>
</table>

</body>

</html>
<?php }?>