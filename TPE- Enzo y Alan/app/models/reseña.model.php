<?php

class ReseñaModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8', 'root', '');
    }

    function getReseña() {
        $query = $this->db->prepare('SELECT * FROM reseñas');
        $query->execute();

        // $tasks es un arreglo de tareas
        $reseña = $query->fetchAll(PDO::FETCH_OBJ);

        return $reseña;
    }
    function agregarReseña($pelicula, $reseña, $email) {
        $query = $this->db->prepare('INSERT INTO reseñas (id_pelicula, reseña, email) VALUES(?,?,?)');
        $query->execute([$pelicula, $reseña]);

        return $this->db->lastInsertId();
    }

    
function borrarReseña($id) {
    $query = $this->db->prepare('DELETE FROM reseñas WHERE id = ?');
    $query->execute([$id]);
}

function actualizarReseña($id) {    
    $query = $this->db->prepare('UPDATE reseñas SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
}
}