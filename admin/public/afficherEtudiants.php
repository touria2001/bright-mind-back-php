<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location:connecter.php"); 
 
}
else{
    if($_SESSION['admin']==0){
        header("Location:connecter.php"); 
 
    }

    require_once '../../etudiant/class/CRUDStudent.class.php';

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

$arrayStudent = new CRUDStudent();?>




 
<table>
    <thead>
        
        <td>first name</td>
        <td>last name</td>
       <td>status</td>
    </thead>
    <tbody>
<?php
  foreach( $arrayStudent->readStudent() as $student){?>
    <tr>
    <td><?php echo $student['prenom']; ?></td>
    <td> <?php echo $student['nom']; ?></td>
    <td><?php echo $student['email'] ;?></td>
    <td><?php echo $student['niveauScolaire']; ?></td>
    
   <td>
    <?php if($student['status'] == 0 ){?>
   <a href="../include/activerCompteEtudiant.php?id=<?php echo $student['id'] ;?>&status=0">Disable</a>

   <?php }else {?>
    <a href="../include/activerCompteEtudiant.php?id=<?php echo $student['id'] ;?>&status=1">Enable</a>

   <?php } ?>
   



</td>
    
    
    </tr>
<?php } ?>
    </tbody>
</table>

</body>

</html>
<?php }?>