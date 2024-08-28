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


$conexion = new mysqli('localhost', 'root', '', 'no me se el nombre que le has puesto a la base xddd');

if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

$tipo_oficio = isset($_GET['acá poné según lo que vas a buscar, o el name del forms xd']) ? $conexion->real_escape_string($_GET['tipo_oficio']) : '';

$consulta = isset($_GET['consulta']) ? $conexion->real_escape_string($_GET['consulta']) : '';

$sql_profesionistas = "SELECT * FROM profesionistas WHERE 1=1";
$sql_empresas = "SELECT * FROM empresas WHERE 1=1";

if ($tipo_oficio) {
    $sql_profesionistas .= " AND oficio = '$tipo_oficio'";
}

if ($consulta) {
    $sql_profesionistas .= " AND (nombre LIKE '%$consulta%' OR descripcion LIKE '%$consulta%')";
    $sql_empresas .= " AND (nombre LIKE '%$consulta%' OR descripcion LIKE '%$consulta%')";
}

$resultado_profesionistas = $conexion->query($sql_profesionistas);
$resultado_empresas = $conexion->query($sql_empresas);

echo "<h2>Resultados de la búsqueda:</h2>";

if ($resultado_profesionistas->num_rows > 0) {
    echo "<h3>Profesionistas</h3>";
    while($fila = $resultado_profesionistas->fetch_assoc()) {
        echo "<p><strong>" . $fila['nombre'] . "</strong> - " . ucfirst($fila['oficio']) . "<br>" . $fila['descripcion'] . "</p>";
    }
} else {
    echo "<p>No se encontraron profesionistas para los criterios de búsqueda.</p>";
}

if ($resultado_empresas->num_rows > 0) {
    echo "<h3>Empresas</h3>";
    while($fila = $resultado_empresas->fetch_assoc()) {
        echo "<p><strong>" . $fila['nombre'] . "</strong><br>" . $fila['descripcion'] . "</p>";
    }
} else {
    echo "<p>No se encontraron empresas para los criterios de búsqueda.</p>";
}

$conexion->close();
?>