<?php
class Database {

    private $host = 'localhost';//nombre del servidor o host...
    private $dbname = 'calendar_db'; //Nombre de la Base de datos
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

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    $sql = "INSERT INTO events (date, title, description, type) VALUES ('$date', '$title', '$description', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo "Evento guardado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>