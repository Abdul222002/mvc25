<?php

require_once('models/pelicula.php');

//cargar modelo

//comprobar variables

//operar

$db=Connection::connect();

$q="SELECT * FROM peliculas";
$result=$db->query($q);


if($result){
    while($row=mysqli_fetch_array($result)){
       $peliculas[]= new Pelicula($row['id'],$row['title'], $row['director'], $row['year']);
    }
}

// cargar vista
if (!isset($_GET["id"])) {
    require_once 'views/listado.phtml';
}else{
    require_once 'views/showmovies.phtml';
}

