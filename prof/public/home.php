<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>les classes</h4>
    <?php
   require_once '../include/autoloadProf.php';
   $arrayClass = new Prof();
?>
    <table>
        <thead>
            <td>name</td>
            <td>nombre d'etudiants</td>

        </thead>
        <tbody>

            <?php foreach( $arrayClass->yourClass(1) as $class)
{
?>
            <td><?php echo $class['nom']; ?></td>
            <td><?php echo $arrayClass->nombreEtudiants($class['id']); 
            } ?></td>
        </tbody>
    </table>
    <?php   $arrayClass=null; ?>
</body>

</html>