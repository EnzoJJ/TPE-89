<?php
require_once './app/models/pelicula.model.php';
require_once './app/views/pelicula.view.php';

class PeliculaController {
    private $model;
    private $view;

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
        // Obtener los detalles de una película desde el modelo
        $pelicula = $this->model->obtenerPeliculaPorId($idPelicula);

        // Mostrar la vista de detalle de la película
        $this->view->mostrarDetallePelicula($pelicula);
    }

    public function agregarPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $genero) {
        $exito = PeliculaModel::agregarPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $genero);

        if ($exito) {
            echo "La película se agregó correctamente.";
        } else {
            echo "Hubo un error al agregar la película.";
        }
    }
}
?>
