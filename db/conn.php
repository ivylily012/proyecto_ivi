<?php
class Database {

    private $host = 'localhost';//nombre del servidor o host...
    private $dbname = 'busqueda_trabajo'; //Nombre de la Base de datos
    private $username = 'root';//Nombre del usuario RECORDAR CAMBIARLO PARA MAYOR SEGURIDAD!
    private $password = '';//CONTRASEÑA DEL USUARIO CON CRDENCIALES DE ACCESO A LA DB
    private $conn; //VARIABLE DE INVOCACION

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
?>