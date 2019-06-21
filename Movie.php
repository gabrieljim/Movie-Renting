<?php
    class Movie {
        
        public $nombre;
        public $year;
        public $director;
        public $precio;
        public $alquilada;
        public $devolucion;

        public function __construct($nombre, $year, $director, $precio, $alquilada, $devolucion) {
            $this -> nombre = $nombre;
            $this -> year = $year;
            $this -> director = $director;
            $this -> precio = $precio;
            $this -> alquilada = $alquilada;
            $this -> devolucion = $devolucion;
        }
    }
?>
