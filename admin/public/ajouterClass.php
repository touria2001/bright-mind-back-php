<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location:connecter.php"); 
 
}
else{
    if($_SESSION['admin']==0){
        header("Location:connecter.php"); 
 
    }



$id = $_SESSION['id'];
require_once '../include/autoloadAdmin.php';
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
<form id="sign-up-form" method="post" action="">
  <label for="nom">name</label>     
  <input type="text" name="name">
  <p id="nomError"></p>

  <label for="subject">subject</label>
<input list="navigateurs" id="subject" name="subject"/>
<datalist id="navigateurs">
  <option value="maths">
  <option value="physics">
  <option value="science of life and earth">
  <option value="frensh">
  <option value="english">
  <option value="arabic">
  <option value="philosophie">
  <option value="History and Geography">
  <option value="Islamic education">
  <option value="spanish">
  <option value="German">
  <option value="translation">
</datalist>
<p id="subjectError"></p>

<label for="prof">Teacher</label>
<select name="prof" id="prof">
   <?php $prof = new CRUDProf();
   foreach( $prof->readProf() as $pr){
    ?>
    <option value="<?php echo $pr['id']; ?>"><?php echo $pr['nom']." "; ?><?php echo $pr['prenom']; ?></option>
    <?php 
   }
   ?> 
</select>
<p id="teacherError"></p>

<input type="submit" value="Create class" id="submit">
</form>
    <p id="error"></p>
    <script src="assert/js/ajouterClass.js">
    </script>


</body>
</html>
<?php } ?>