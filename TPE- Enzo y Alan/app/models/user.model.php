<?php

class UserModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8', 'root', '');
    }

    // En UserModel.php

    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ?');
        $query->execute([$username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

}