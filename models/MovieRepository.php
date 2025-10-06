<?php

class MovieRepository {
    public static function getMovieById($idMovie){
        $db = Connection::connect();
        $q="SELECT * FROM peliculas WHERE id=".$idMovie;
        $result=$db->query($q);
    if($row = mysqli_fetch_assoc($result)){
        return new Pelicula($row['id'] , $row['title'], $row['director'], $row['image'], $row['year']);
    } else {
        return null;    
    }
    }   

    public static function getAllMovies(){
        $db = Connection::connect();
        $q="SELECT * FROM peliculas";
        $result=$db->query($q);
        $peliculas = array();
        if($result){
            while($row=mysqli_fetch_assoc($result)){
               $peliculas[]= new Pelicula($row['id'],$row['title'], $row['director'], $row['image'],$row['year']);
            }
        }
        return $peliculas;
    }

    public static function deleteMovieById($idMovie){
        $db = Connection::connect();
        $deleteMovie="DELETE FROM peliculas WHERE id=".$idMovie;
        if($db-> query($deleteMovie)){
            return true;
        } else {
            return false;
        }
    }

    public static function addMovie($title, $director, $year, $image) {
        $db = Connection::connect();
        $addMovie="INSERT INTO peliculas (title, director, year, image) VALUES ('".$title."','".$director."','".$year."','".$image."')";
        if($db->query($addMovie)){
            return true;
        } else {
            return false;
        }
    }

    public static function adduser($username, $email, $password) {
        $db = Connection::connect();
        $q3="INSERT INTO users (username, email, password) VALUES ('".$username."','".$email."','".md5($password)."')";       
        $result3 = $db->query($q3);
        if($result3){
            return true;
        } else {
            return false;
        }}
    }

?>