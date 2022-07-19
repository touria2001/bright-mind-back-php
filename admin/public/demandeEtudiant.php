<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:connecter.php");
} else {
    if ($_SESSION['admin'] == 0) {
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

        $arrayDemande = new Admin(); ?>





        <table>
            <thead>
                <td>id</td>
                <td>first name</td>
                <td>last name</td>
                <td>email</td>
                <td>school level</td>
                <td>accept</td>
                <td>refuse</td>
            </thead>
            <tbody>
                <?php
                foreach ($arrayDemande->demandeEtudiant() as $demande) { ?>
                    <tr>
                        <td><?php echo $demande['id'] ?></td>
                        <td><?php echo $demande['prenom']; ?></td>
                        <td> <?php echo $demande['nom']; ?></td>
                        <td><?php echo $demande['email'] ?></td>
                        <td><?php echo $demande['niveauScolaire'] ?></td>
                        <td><a href="../include/accepterOuRefuserEtudiant.php?id=<?php echo $demande['id']; ?>&accept=1">accept</a></td>
                        <td><a href="../include/accepterOuRefuserEtudiant.php?id=<?php echo $demande['id'] ;?>&accept=0">refuse</a></td>

                     





                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </body>

    </html>
<?php } ?>