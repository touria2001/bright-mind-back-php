<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>une classe</h4>
    <?php
    require_once '../include/autoloadProf.php';
    $arrayClass = new Prof();
    ?>
<div>---cours---:
<?php foreach( $arrayClass->GetCoursByClass(7) as $class)
{ ?>
<p> <?php  echo $class['titre'];?> </p>

<p>--chapitre--:</p>
<?php foreach( $arrayClass->GetChapitreByCours($class['id']) as $chapitre)
{
    ?>
<p> <?php  echo $chapitre['titre'];?> </p>
<p>--lecon--:</p>
<?php foreach( $arrayClass->GetLeçonByChapitre($chapitre['id']) as $lecon)
{ ?>
<p> <?php  echo $lecon['titre'];?> </p>
<?php
    
}
}
    
}
?>
</div>
</body>

</html>