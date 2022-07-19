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
    <form id="profil-form">
        <?php require_once '../include/autoloadAdmin.php';
        $admin =  new Admin();
        $ad = $admin->getAdmin($id); ?>
        <label for="photo">profile picture</label>
        <img src="<?php
                    if (file_exists("../include/upload/".$id . ".png")) {
                        echo "../include/upload/".$id . ".png";
                    } else if (file_exists("../include/upload/".$id. ".jpeg")) {
                        echo "../include/upload/".$id . ".jpeg";
                    } else if (file_exists("../include/upload/".$id . ".jpg")) {
                        echo "../include/upload/".$id . ".jpg";
                    } else {
                        echo "../include/upload/template.png";
                    }

                    ?>">
        <input type="file" name="avatar" id="photo">
        <p class="error" id="photoError"></p>

        <label for="nom">last name</label>
        <input type="text" id="nom" name="nom" value="<?php echo $ad['nom']; ?>">
        <p class="error" id="nomError"></p>

        <label for="prenom">first name</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $ad['prenom'];  ?>">
        <p class="error" id="prenomError"></p>

        <label for="email">email</label>
        <input type="email" id="email" name="email" value="<?php echo $ad['email'];  ?>">
        <p class="error" id="emailError"></p>

        <label for="cin">cin</label>
        <input type="text" id="cin" name="cin" value="<?php echo $ad['cin'];  ?>">
        <p class="error" id="cinError"></p>

        <label for="tel">phone number</label>
        <input type="text" id="tel" name="tel" value="<?php echo $ad['telephone'];  ?>">
        <p class="error" id="telError"></p>

        <label for="pw">password</label>
        <input type="password" id="pw" name="pw">
        <p class="error" id="pwError"></p>

        <label for="pwVerif">verify password</label>
        <input type="password" id="pwVerif" name="pwVerif">
        <p class="error" id="pwVerifError"></p>

        <input id="save" type="submit" value="save">

    </form>
    <p id="success" class="error"></p>

    <script src="assert/js/profil.js"></script>

</body>

</html>
<?php } ?>