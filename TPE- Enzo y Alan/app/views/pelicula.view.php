<?php

class Pelicula {
    public function showPeliculas($pelicula) {
        $count = count($pelicula);
        
        require 'templates/lista.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

}