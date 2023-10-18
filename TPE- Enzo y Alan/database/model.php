<?php 
require_once './database/config.php';
class Model{
    protected $db;

    function __contruct() {
        $this->dbVerify();
        $this->db = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->deploy();    
    }
    function dbVerify() {
        $nombreDB = MYSQL_DB;
        $pdo = new PDO('mysql:host='.MYSQL_HOST.';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $query = "CREATE DATABASE IF NOT EXISTS $nombreDB";
        $pdo->exec($query);
    }
}