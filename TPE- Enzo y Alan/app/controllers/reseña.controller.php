<?php
require_once './app/models/reseña.model.php';
require_once './app/views/reseña.view.php';
class ReseñaController {
    private $model;

    function __construct() {
        $this->model = new ReseñaModel();
    }

    public function listarReseñas() {
        // Obtener la lista de reseñas desde el modelo
        $reseñas = $this->model->getReseña();

        // Mostrar la vista de listado de reseñas
        $reseñaView = new Reseñas();
        $reseñaView->showReseñas($reseñas);
    }

    public function agregarReseña($pelicula, $reseña, $email) {
        // Lógica para agregar una reseña
        $idReseña = $this->model->agregarReseña($pelicula, $reseña, $email);

        // Redireccionar a la página de reseñas o donde consideres apropiado
        header('Location: /reseñas');
    }

    public function borrarReseña($id) {
        // Lógica para borrar una reseña
        $this->model->borrarReseña($id);

        // Redireccionar a la página de reseñas o donde consideres apropiado
        header('Location: /reseñas');
    }

    public function actualizarReseña($id) {
        // Lógica para actualizar una reseña
        $this->model->actualizarReseña($id);

        // Redireccionar a la página de reseñas o donde consideres apropiado
        header('Location: /reseñas');
    }
}
?>

