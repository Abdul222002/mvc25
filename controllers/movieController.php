<?php

//CARGAR MODELO
require_once('helpers/FileHelper.php');


//AÑADIR PELÍCULA
if(!isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='addMovie'){
    if(isset($_POST['addMovie2'])){
        if(isset($_POST['title']) && isset($_POST['director']) && isset($_POST['year']) && isset($_FILES['image'])){
            if(!empty($_POST['title']) && !empty($_POST['director']) && !empty($_POST['year']) && !empty($_FILES['image'])){
                $fileName= $_FILES['image']['name'];

                if(!FileHelper::fileHandler($_FILES['image']['tmp_name'], 'public/img/'.$fileName)){
                    // Manejar error de carga de archivo
                    $fileName='';
                }

                if(MovieRepository::addMovie($_POST['title'], $_POST['director'], $_POST['year'], $fileName)){
                    header('Location:index.php?add=success');
                    exit();
                }     
            }
        }  
    }
    require_once 'views/addmovie.phtml';
    exit();
}


// ELIMINAR PELÍCULA
if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['id'])){
    if(MovieRepository::deleteMovieById($_GET['id'])){
        header('Location:index.php?delete=success');
    } else {
        header('Location:index.php?delete=error');
    }
    exit();
}

//MOSTRAR VISTAS
if (!isset($_GET["id"])) {
    $peliculas = MovieRepository::getAllMovies();
    require_once 'views/listado.phtml';
    
} else {
    $pelicula = MovieRepository::getMovieById($_GET["id"]);
    require_once 'views/showmovies.phtml';
}
?>