<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="post" id="sign-in-form" action="">
    <input type="email" name="email" value="<?php if(isset($_COOKIE["emailBright"])) echo $_COOKIE["emailBright"];?>">
    <p id="emailError"></p>
    <input type="password" name="pw" value="<?php if(isset($_COOKIE["passwordBright"])){ echo $_COOKIE['passwordBright'];}?>">
    <p id="pwError"></p>
    <input type="checkbox" name="souvenir" id="souvenir">
    <label for="souvenir">Remember me</label>
    <input id="connecte" type="submit" value="login">
   </form> 
 <form id="oubliePw">
  <input type="email" name="email" id="emailOublie">
  <input id="oublieSubmit" type="submit" value="get password">
<p class="erreurAjax"></p>  
</form>
   <script src="assert/js/connecte.js">
    </script>
</body>
</html>

