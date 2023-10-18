<?php

require_once './app/models/pelicula.model.php';
require_once './app/views/pelicula.view.php';

class PeliculaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new PeliculaModel();
        $this->view = new PeliculaView();
    }

    public function addPelicula()
{
    AuthHelper::verify();

    // Check if all form fields are provided
    if (
        isset($_POST['Titulo']) &&
        isset($_POST['Director']) &&
        isset($_POST['Fecha_de_lanzamiento']) &&
        isset($_POST['Sinopsis'])
    ) {
        // Ensure all fields are non-empty
        if (
            !empty($_POST['Titulo']) &&
            !empty($_POST['Director']) &&
            !empty($_POST['Fecha_de_lanzamiento']) &&
            !empty($_POST['Sinopsis'])
        ) {
            // All fields are provided and non-empty, proceed with insertion
            $titulo = $_POST['Titulo'];
            $director = $_POST['Director'];
            $fechaLanzamiento = $_POST['Fecha_de_lanzamiento'];
            $sinopsis = $_POST['Sinopsis'];

            // Get the id_usuario from your session or wherever it's available
            $id_usuario = $_SESSION['USER_ID'];  // Assuming you store the user ID in a session

            // Call the model to insert data, passing id_usuario as an argument
            $this->model->insertPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $id_usuario);

            // Redirect after successful insertion
            header('Location: ' . BASE_URL);
            exit();
        } else {
            // Display an error message for required fields
            echo 'All form fields are required.';
        }
    } else {
        // Display an error message if any required fields are missing
        echo 'All form fields are required.';
    }
}




    public function showPeliculas() {
        $travels = $this->model->getPeliculas();
        $this->view->showPeliculas($travels);
    }

    public function showDetails($id_viajes) {
        $detailsTravels = $this->model->getDetailsById($id_viajes);
        $this->view->showDetails($detailsTravels);
    }

    public function removePelicula($id_pelicula) {
        $this->model->deletePelicula($id_pelicula);
        header('Location: ' . BASE_URL);
        exit();
    }
}

?>
