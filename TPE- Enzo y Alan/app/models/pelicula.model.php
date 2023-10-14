<?php
class PeliculaModel {
    public static function obtenerPeliculas() {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8mb4', 'root', '');
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

    public static function obtenerDetallesPelicula($idPelicula) {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null; // Devolvemos null en caso de error
        }

        // Consulta SQL para obtener los detalles de una película por su ID
        $sql = "SELECT * FROM pelicula WHERE id_pelicula = :idPelicula";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPelicula', $idPelicula, PDO::PARAM_INT);
        $stmt->execute();

        $pelicula = $stmt->fetch(PDO::FETCH_ASSOC);

        return $pelicula;
    }


    public static function agregarPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $genero) {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=proyectp;charset=utf8mb4', 'root', '');
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return false; // Devolvemos false en caso de error
        }

        // Consulta SQL para agregar una película
        $sql = "INSERT INTO pelicula (Titulo, Director, `Fecha de lanzamiento`, Sinopsis, Genero)
                VALUES (:titulo, :director, :fechaLanzamiento, :sinopsis, :genero)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':director', $director, PDO::PARAM_STR);
        $stmt->bindParam(':fechaLanzamiento', $fechaLanzamiento, PDO::PARAM_STR);
        $stmt->bindParam(':sinopsis', $sinopsis, PDO::PARAM_STR);
        $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true; // La inserción fue exitosa
        } else {
            return false; // Hubo un error en la inserción
        }
    }
}
?>



