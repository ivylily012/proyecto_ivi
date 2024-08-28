<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'busqueda_trabajo';
    private $username = 'root';
    private $password = '';
    private $conn;

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

$database = new Database();
$conn = $database->connect();

// Manejar la solicitud de CRUD
$action = $_GET['action'] ?? null;

if ($action === 'fetch') {
    fetchRequests($conn);
} elseif ($action === 'update') {
    updateRequest($conn);
} elseif ($action === 'delete') {
    deleteRequest($conn);
}

function fetchRequests($conn) {
    $stmt = $conn->prepare("SELECT * FROM registros");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}

function updateRequest($conn) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $curriculum = $_POST['curriculum'];

    $stmt = $conn->prepare("UPDATE registros SET nombre = :nombre, email = :email, telefono = :telefono, curriculum = :curriculum WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':curriculum', $curriculum);
    $stmt->execute();
}

function deleteRequest($conn) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM registros WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
?>