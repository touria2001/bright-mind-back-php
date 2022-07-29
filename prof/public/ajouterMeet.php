<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>ajouter un meet</h4>
    <form id="ajouterMeet-form" method="post" action="">
    <input type="hidden" name="idClass" value="7">
        <input type="datetime-local" id="date" name="date">
        <p class="error" id="dateError"></p>
        <input type="text" placeholder="description" name='description'>
        <p class="error" id="descriptionError"></p>
        <input type="text" placeholder="lien" name='lien'>
        <p class="error" id="lienError"></p>
        <input type="submit" id="ajouter" value="ajouter">

    </form>
    <script src="assert/js/ajouterMeet.js"></script>
</body>
<style>
    .error{
        color: red;
    }
</style>
</html>