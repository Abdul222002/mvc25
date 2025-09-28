<?php
class Pelicula {
    private $id;
    private $title;
    private $director;
    private $year;
    private $image;

    function __construct($id,$title, $director,$image ,$year) {
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->id = $id;
        $this->image = $image;
    }

    function getImage() {
        return $this->image;
    }
    
    function getTitle() {
        return $this->title;
    }

    function getDirector() {
        return $this->director;
    }

    function getYear() {
        return $this->year;
    }
    function getId() {
        return $this->id;
    }
}

?>