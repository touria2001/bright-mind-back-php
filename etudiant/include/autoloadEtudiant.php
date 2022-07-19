<?php
spl_autoload_register(function($className){

    require '../class/'.$className.'.class.php';
});