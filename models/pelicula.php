<?php
class Pelicula {
    private $id;
    private $title;
    private $director;
    private $year;

    function __construct($id,$title, $director, $year) {
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->id = $id;
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