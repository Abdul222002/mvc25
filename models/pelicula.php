<?php
class Peliculas {
    private $titulo;
    private $director;
    private $anio;

    function __construct($titulo, $director, $anio) {
        $this->titulo = $titulo;
        $this->director = $director;
        $this->anio = $anio;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDirector() {
        return $this->director;
    }

    function getAnio() {
        return $this->anio;
    }
}

?>