<?php

const DB_HOST = "localhost";
const DBNAME = "invilara";
const DB_USERNAME = "root";
const DB_PASSWORD = "";

class BaseDatos
{
    private $host;
    private $dbname;
    private $username;
    private $password;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->dbname = DBNAME;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
    }

    /**
     * Devuelve una instancia PDO de la base de datos.
     * @return PDO
     */
    public function crear_conexion()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try {
            return new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
            exit();
        }
    }
}
