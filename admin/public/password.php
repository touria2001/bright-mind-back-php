<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="sign-up-form">
        <input value="<?php echo $_GET['email']; ?>" name="email">
    <label for="pw">password</label>
        <input type="password" id="pw" name="pw">
        <p class="error" id="pwError"></p>
       
        <label for="pwVerif">password confirmation</label>
        <input type="password" id="pwVerif" name="pwVerif">
        <p class="error" id="pwVerifError"></p>
       
        <input id="inscrir" type="submit" value="save">
    </form>
    <p id = "error" class="error"></p>
    <script src="assert/js/password.js"></script>
</body>
</html>