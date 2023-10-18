<?php

class PeliculaModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_pelicula;charset=utf8', 'root', '');
    }
    function getPeliculas()
    {
        $query = $this->db->prepare('SELECT * FROM pelicula');
        $query->execute();

        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);

        return $peliculas;

        //travels es un arreglo con los viajes
    }

    function getDetailsById($id_pelicula)
    {
        $query = $this->db->prepare('SELECT * FROM pelicula where id_pelicula = ?');
        $query->execute([$id_pelicula]);

        $details = $query->fetchAll(PDO::FETCH_OBJ);
        return $details;
    }
    function insertPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $id_usuario) {
        $query = $this->db->prepare('INSERT INTO pelicula (Titulo, Director, FechaDeLanzamiento, Sinopsis, id_usuario) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$titulo, $director, $fechaLanzamiento, $sinopsis, $id_usuario]);
    
        return $this->db->lastInsertId();
    }
    
    

    function deletePelicula($id_pelicula){
        $query = $this->db->prepare('DELETE FROM pelicula WHERE id_pelicula = ?');
        $query->execute([$id_pelicula]);
    
    }
}