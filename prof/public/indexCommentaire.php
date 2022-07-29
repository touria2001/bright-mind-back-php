<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body >
    <?php
    require_once '../include/autoloadProf.php';
    $prof = new Prof();
    $prof-> supprimerCommentSansFils();
    ?>
    <h4>commentaire sans parent</h4>
    <div>
    <?php foreach ($prof->commentaires_sans_parent() as $comment) {
          require("commentaire.php");

    } ?>
   </div>
    <h1>ajouter commentaire</h1>
    <form action="" id="ajouterCommentaire-form" method="post">
        <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
        <p id="commentaireError"></p>
        <input type="submit" id="envoyer">
    </form>


  <script src="assert/js/ajouterCommentaire.js"></script>
</body>

</html>