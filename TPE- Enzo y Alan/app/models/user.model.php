<?php
class UserModel {
    private $db;

    function __construct(){
        try {
            // Conexión a la base de datos
            $this->db = new PDO('mysql:host=localhost;dbname=db_pelicula;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar manejo de errores
        } catch (PDOException $e) {
            // Manejo de errores de conexión
            die('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    public function getByUsername($username) {
        try {
            // Preparar la consulta
            $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ?');
            // Ejecutar la consulta con el parámetro
            $query->execute([$username]);
            // Obtener el usuario como objeto
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            // Manejar errores de la consulta
            die('Error al obtener el usuario: ' . $e->getMessage());
        }
    }
}
?>
