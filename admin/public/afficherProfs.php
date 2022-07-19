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

$arrayProf = new CRUDProf();?>




 
<table>
    <thead>
        
        <td>first name</td>
        <td>last name</td>
       <td>status</td>
    </thead>
    <tbody>
<?php
  foreach( $arrayProf->readProf() as $prof){?>
    <tr>
    <td><?php echo $prof['prenom']; ?></td>
    <td> <?php echo $prof['nom']; ?></td>
   <td>
    <?php if($prof['status'] == 0 ){?>
   <a href="../include/activerCompteProf.php?id=<?php echo $prof['id'] ;?>&status=0">Disable</a>

   <?php }else {?>
    <a href="../include/activerCompteProf.php?id=<?php echo $prof['id'] ;?>&status=1">Enable</a>

   <?php } ?>
   



</td>
    
    
    </tr>
<?php } ?>
    </tbody>
</table>

</body>

</html>
<?php }?>