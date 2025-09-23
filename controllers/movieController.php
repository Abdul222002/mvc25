<?php

$q="SELECT * FROM peliculas";
$result=$db->query($q);

if($result){
    while($row=mysqli_fetch_assoc($result)){
       $peliculas[]= new Pelicula($row['id'],$row['title'], $row['director'], $row['year']);
    }
}


//MOSTRAR VISTAS
    if (!isset($_GET["id"])) {
    require_once 'views/listado.phtml';
    }else{
        $q="SELECT * FROM peliculas WHERE id=".$_GET['id'];
        $result=$db->query($q);
        $error=false;

        if($row = mysqli_fetch_assoc($result)){
            $pelicula = new Pelicula($row['id'], $row['title'], $row['director'], $row['year']);
        }else{
        $error="No se ha encontrado la película.";
        }
    require_once 'views/showmovies.phtml';
}
?>