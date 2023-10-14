<?php
class Reseñas {
    public function showReseñas($reseñas) {
        $count = count($reseñas);
        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        // mostrar el template
        require 'templates/listaReseñas.phtml';
}
    public function showError($error) {
         require 'templates/error.phtml';
    }
}
?>
