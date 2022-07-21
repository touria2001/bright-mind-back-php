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
        <label for="prenom">first name</label>
        <input type="text" id="prenom" name="prenom">
        <p class="error" id="prenomError"></p>
       
        <label for="nom">last name</label>
        <input type="text" id="nom" name="nom">
        <p class="error" id="nomError"></p>
      
        <label for="email">email</label>
        <input type="email" id="email" name="email">
        <p class="error" id="emailError"></p>

        <label for="niveau">school level</label>
        <input list="navigateurs" name="niveauScolaire" id="niveau" />
        <datalist id="navigateurs">
            <option value="first year of primary school">first year of primary school</option>
            <option value="second year of primary school">
            <option value="third year of primary school">
            <option value="fourth year of primary school">
            <option value="fifth year of primary school">
            <option value="sixth year of primary school">
            <option value="first year of college">
            <option value="second year of college">
            <option value="third year of college">
            <option value="first year of high school">
            <option value="second year of high school">
            <option value="third year of high school">
            <option value="university">
            <option value="not at school">
        </datalist>
        <p class="error" id="niveauError"></p>
        
        <label for="cin">cin</label>
        <input type="text" id="cin" name="cin">
        <p class="error" id="cinError"></p>

        <label for="email">phone number</label>
        <input type="text" id="tel" name="tel">
        <p class="error" id="telError"></p>


        <label for="pw">password</label>
        <input type="password" id="pw" name="pw">
        <p class="error" id="pwError"></p>
       
        <label for="pwVerif">password confirmation</label>
        <input type="password" id="pwVerif" name="pwVerif">
        <p class="error" id="pwVerifError"></p>
       
        <input id="inscrir" type="submit" value="Create Account">
    </form>
    <p id="error"></p>
    <script src="assert/js/creerEtudiant.js">
    </script>


</body>
</html>
<?php } ?>