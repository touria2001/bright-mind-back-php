<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location:connecter.php"); 
 
}
else{
    require_once '../include/autoloadAdmin.php';
    $admin = new Admin();
    if($_SESSION['admin']==0 or $admin->isSuperviseur() != $_SESSION['id'] ){
        header("Location:connecter.php"); 
     
 
    }
    
   

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

$arrayAdmin = new CRUDAdmin();?>




 
<table>
    <thead>
        
        <td>first name</td>
        <td>last name</td>
       <td>status</td>
    </thead>
    <tbody>
<?php
  foreach( $arrayAdmin->readAdmin() as $admin){?>
    <tr>
    <td><?php echo $admin['prenom']; ?></td>
    <td> <?php echo $admin['nom']; ?></td>
   <td>
    <?php if($admin['status'] == 0 ){?>
   <a href="../include/activerCompte.php?id=<?php echo $admin['id'] ;?>&status=0">Disable</a>

   <?php }else {?>
    <a href="../include/activerCompte.php?id=<?php echo $admin['id'] ;?>&status=1">Enable</a>

   <?php } ?>
   



</td>
    
    
    </tr>
<?php } ?>
    </tbody>
</table>

</body>

</html>
<?php }?>