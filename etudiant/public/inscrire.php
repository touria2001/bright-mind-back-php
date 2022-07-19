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
       
        <select name="niveauScolaire" id="niveau">
            <option value="primaire1">first year of primary school</option>
            <option value="primaire2">second year of primary school</option>
            <option value="primaire3">third year of primary school</option>
            <option value="primaire4">fourth year of primary school</option>
            <option value="primaire5">fifth year of primary school</option>
            <option value="primaire6">sixth year of primary school</option>
            <option value="college1">first year of college</option>
            <option value="college2">second year of college</option>
            <option value="college3">third year of college</option>
            <option value="lycee5">first year of high school</option>
            <option value="lycee1Bac">second year of high school </option>
            <option value="lycee2Bac">third year of high school</option>
            <option value="univesite">university</option>
            <option value="noEcole">not at school</option>
        </select>
        <p class="error" id="niveauError"></p>
        <label for="pw">password</label>
        <input type="password" id="pw" name="pw">
        <p class="error" id="pwError"></p>
        <label for="pwVerif">password confirmation</label>
        <input type="password" id="pwVerif" name="pwVerif">
        <p class="error" id="pwVerifError"></p>
        <input id="inscrir" type="submit" value="s'inscrire">
    </form>
    <p id="error"></p>
    <script src="assert/js/inscrire.js">
    </script>
</body>

</html>