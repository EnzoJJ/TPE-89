<?php

class PeliculaView {
    function showPeliculas($peliculas) {
        require './templates/lista.phtml';
    }
    function showDetails($peliculas){
        require './templates/detalles.phtml';
    }
    function showEdit($id_pelicula){
        require './templates/modificar.phtml';
    }
}

?> 