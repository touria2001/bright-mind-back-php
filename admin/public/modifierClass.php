<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:connecter.php");
} else {
    if ($_SESSION['admin'] == 0) {
        header("Location:connecter.php");
    }



    $id = $_SESSION['id'];
    require_once '../include/autoloadAdmin.php';
    $crudClass = new CRUDClass();
    $class = $crudClass->readClassById($_GET['id']);
    $crudProf = new CRUDProf();
    $prof = $crudProf->readProfById($class['idProf']);
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

        <form id="sign-up-form" method="post" accept-charset="utf-8" action="">
            <input name="id" value="<?php echo $_GET['id'] ?>" style="display:none;">
            <label for="nom">name</label>
            <input type="text" name="name" value="<?php echo $class['nom']; ?>">
            <p id="nomError" class="error"></p>

            <label for="subject">subject</label>
            <input list="navigateurs" id="subject" name="subject" value="<?php echo $class['matiere']; ?>" />
            <datalist id="navigateurs">
                <option value="maths">
                <option value="physics">
                <option value="science of life and earth">
                <option value="frensh">
                <option value="english">
                <option value="arabic">
                <option value="philosophie">
                <option value="History and Geography">
                <option value="Islamic education">
                <option value="spanish">
                <option value="German">
                <option value="translation">
            </datalist>
            <p id="subjectError" class="error"></p>

            <label for="prof">Teacher</label>
            <select name="prof" id="prof" value="<?php $prof ?>">
                <?php $prof = new CRUDProf();
                foreach ($prof->readProf() as $pr) {
                ?>
                    <option value="<?php echo $pr['id']; ?>"><?php echo $pr['nom'] . " "; ?><?php echo $pr['prenom']; ?></option>
                <?php
                }
                ?>
            </select>
            <p id="teacherError" class="error"></p>

            <input type="submit" value="Edit class" id="submit">
        </form>
        <p id="error"></p>
        <script src="assert/js/modifierClass.js">
        </script>


    </body>

    </html>
<?php } ?>