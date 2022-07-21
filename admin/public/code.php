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
        <label for="code">code</label>
        <input type="text" id="code" name="code">
        <input type="text" vlaue="<?php echo $_GET['email']; ?>" style="display:none;" name="email">
        <input type="submit" value="verify" id="submit">
    </form>
    <p id = "error" class="error"></p>
    <script src="assert/js/code.js"></script>
</body>
</html>