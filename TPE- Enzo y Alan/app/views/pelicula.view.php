<?php

class Pelicula {
    public function showPeliculas($pelicula) {
        $count = count($pelicula);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/lista.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}