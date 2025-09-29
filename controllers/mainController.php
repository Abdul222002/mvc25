<?php

//cargar modelo
require_once('models/Pelicula.php');
require_once('models/User.php');

$db = Connection::connect();

session_start();



if(isset($_GET['c'])){
    require_once('controllers/'.$_GET['c'].'Controller.php');
}else{
    if(isset($_SESSION['user'])&& $_SESSION['user']){
    require_once('controllers/movieController.php');
}else{
    require_once('controllers/loginController.php');
}
}

// cargar vista 