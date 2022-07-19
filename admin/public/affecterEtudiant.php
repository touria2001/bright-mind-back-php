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

        $Student = new Admin();
        $student = $Student->getStudentById($_GET['id']);
        ?>
        <p>first name : <?php echo $student['prenom']; ?></p>
        <p>last name : <?php echo $student['nom']; ?></p>
        <p>email : <?php echo $student['email']; ?></p>
        <?php

        $student = new Admin(); ?>
        <form action="../include/affectation.php" method="post">
            <input type="text" style="display: none;" name="idEtudiant" value="<?php echo $_GET['id']; ?>">
            <?php $i=0;
            foreach ($Student->afficherMatieres() as $matiere) {
                 ?>
                <p><?php echo $matiere['matiere']; ?></p>
                <select name="subject<?php echo $i++; ?>">
             <option value=""></option>
                    <?php foreach ($student->afficherclassParMatiere($matiere['matiere']) as $class) { ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['nom']; ?><?php echo $class['id']; ?></option>
                    <?php  } ?>
                </select>
            <?php       }       ?>
            <input type="submit" value="save">

        </form>



    </body>

    </html>
<?php } ?>