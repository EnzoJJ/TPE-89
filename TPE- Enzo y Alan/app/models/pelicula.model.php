<?php
class PeliculaModel {
    public static function obtenerPeliculas() {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return array(); // Devolvemos un array vacío en caso de error
        }
        
        // Consulta SQL para obtener todas las películas
        $sql = "SELECT * FROM pelicula";

        $stmt = $conn->query($sql);
        
        $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $peliculas;
    }
    public function obtenerPeliculasPorCategoria($idCategoria) {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=db_peliculas;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return array(); // Devolvemos un array vacío en caso de error
        }
        
        $sql = "SELECT Titulo AS pelicula_titulo, Director, `Fecha de lanzamiento`, Sinopsis, Genero
                FROM pelicula
                WHERE id_genero = :id_genero";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_genero', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        
        $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $peliculas;
    }
}
?>



