<?php

$q="SELECT * FROM peliculas";
$result=$db->query($q);

if($result){
    while($row=mysqli_fetch_assoc($result)){
       $peliculas[]= new Pelicula($row['id'],$row['title'], $row['director'], $row['image'],$row['year']);
    }
}
//AÑADIR PELÍCULA
if(!isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='addMovie'){
    if(isset($_POST['addMovie2'])){
        if(isset($_POST['title']) && isset($_POST['director']) && isset($_POST['year']) && isset($_POST['image'])){
            if(!empty($_POST['title']) && !empty($_POST['director']) && !empty($_POST['year']) && !empty($_POST['image'])){
                $addMovie="INSERT INTO peliculas (title, director, year, image) VALUES ('".$_POST['title']."','".$_POST['director']."','".$_POST['year']."','".$_POST['image']."')";
                $resultAdd=$db->query($addMovie);
                if($resultAdd){
                    echo "<script>alert('Película añadida con éxito'); window.location.href='index.php';</script>";
                    exit();
                } else {
                    $error = "Error al añadir la película: " . $db->error;
                }
            } else {
                $error = "Todos los campos son obligatorios";
            }
        }  
    }
    require_once 'views/addmovie.phtml';
    exit();
}

//MOSTRAR VISTAS
if (!isset($_GET["id"])) {
    require_once 'views/listado.phtml';
} else {
    $q="SELECT * FROM peliculas WHERE id=".$_GET['id'];
    $result=$db->query($q);
    $error=false;

    if($row = mysqli_fetch_assoc($result)){
        $pelicula = new Pelicula($row['id'] , $row['title'], $row['director'], $row['image'], $row['year']);
    } else {
        $error="No se ha encontrado la película.";
    }
    require_once 'views/showmovies.phtml';
}
?>