<?php
require_once './app/models/pelicula.model.php';
require_once './app/views/pelicula.view.php';

class PeliculaController {
    private $model;
    private $view;
    private $reviewController; // Add this line


    public function __construct() {
        $this->model = new PeliculaModel();
        $this->view = new Pelicula();
    }
    

    public function listarPeliculas() {
        // Obtener la lista de películas desde el modelo
        $peliculas = $this->model->obtenerPeliculas();

        // Mostrar la vista de listado de películas
        $this->view->showPeliculas($peliculas);
    }

    public function mostrarDetallePelicula($idPelicula) {
        $pelicula = $this->model->obtenerPeliculaPorId($idPelicula);
        $reseñas = $this->model->obtenerReseñasPorPelicula($idPelicula);
        $this->view->mostrarDetallePelicula($pelicula, $reseñas);
    }
    public function listarPeliculasPorCategoria($idCategoria) {
        $peliculas = $this->model->obtenerPeliculasPorCategoria($idCategoria);
        $this->view->showPeliculas($peliculas);
    }
}
?>
