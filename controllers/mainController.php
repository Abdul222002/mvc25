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
       echo $row['title']." - ".$row['director']." - ".$row['year']."<br>";
    }
}

$peliculas = array(
    new Peliculas("Inception", "Christopher Nolan", 2010),
    new Peliculas("The Godfather", "Francis Ford Coppola", 1972),
    new Peliculas("The Matrix", "The Wachowskis", 1999),
    new Peliculas("Interestellar", "Christopher Nolan", 2014),
    new Peliculas("Pulp Fiction", "Quentin Tarantino", 1994)
);


// cargar vista
if (!isset($_GET["titulo"])) {
    require_once 'views/listado.phtml';
}else{
    require_once 'views/showmovies.phtml';
}

