<?php
require_once '../db/conn.php';


try {
    
$database = new Database();
$conn_db = $database->connect();
    // Conexión a la base de datos usando PDO
//$conn_db = new PDO('mysql:host=localhost;dbname=busqueda_trabajo', 'root', '');
// Establecer el modo de errores de PDO a excepción
//$conn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo 'Conexión realizada';
    // Validación de datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $campos_requeridos = ['nombre', 'apellido', 'email', 'rol', 'psswrd', 'verificar-psswrd'];
        $data = [];
        $responde = [];

        // Validar que todos los campos requeridos están presentes y no vacíos
        foreach ($campos_requeridos as $campo) {
            if (empty($_POST[$campo])) {
                $responde['error'] = "Por favor, complete todos los campos";
                echo json_encode($responde);
                exit;
            }
            $data[$campo] = $_POST[$campo];
        }

        // Validar la contraseña
        if ($data['psswrd'] != $data['verificar-psswrd']) {
            $responde['error'] = "Las contraseñas no coinciden";
            echo json_encode($responde);
            exit;
        }

        // Hashear la contraseña
        $data['psswrd'] = password_hash($data['psswrd'], PASSWORD_DEFAULT);

        // Remover la clave 'verificar-psswrd' ya que no se insertará en la base de datos
        unset($data['verificar-psswrd']);

        try {
            // Preparar la consulta SQL para insertar datos en la base de datos
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO registros ($columns) VALUES ($placeholders)";
            $stmt = $conn_db->prepare($sql);

            // Enlazar los parámetros dinámicamente
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir según el rol
            switch ($data['rol']) {
                case 'cliente':
                    header("Location: ../HTML/inicioSesion.html");
                    break;
                case 'profesionista':
                    header("Location: ../HTML/inicioSesion.html");
                    break;
                case 'empresa':
                    header("Location: ../HTML/inicioSesion.html");
                    break;
                case 'admin':
                    header("Location: ../HTML/inicioSesion.html");
                    break;
                default:
                    $responde['error'] = "Rol no válido";
                    echo json_encode($responde);
                    exit;
            }
            exit;

        } catch (PDOException $e) {
            $responde['error'] = "Error al insertar los datos: " . $e->getMessage();
            echo json_encode($responde);
        }
    }
} catch (PDOException $e) {
    echo 'Error al conectarse: ' . $e->getMessage();
}
?>
