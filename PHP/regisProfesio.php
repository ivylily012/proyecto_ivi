<?php
// Conexión a la base de datos
require_once 'conexion.php';

// Validación de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foto = $_FILES["foto"]["name"];
    $nombre = $_POST["nombre"];
    $nacimiento = $_POST["nacimiento"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $nacionalidad = $_POST["nacionalidad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $redes_sociales = $_POST["redes_sociales"];
    $idiomas = $_POST["idiomas"];
    $oficio = $_POST["oficio"];
    $habilidades = $_POST["habilidades"];
    $perfil_profesional = $_POST["perfil_profesional"];
    $formacion_academica = $_POST["formacion_academica"];
    $descripcion = $_POST["descripcion"];
    $rol = $_POST["rol"];

    // Validación de campos vacíos
    if (empty($nombre) || empty($nacimiento) || empty($edad) || empty($genero) || empty($nacionalidad) || empty($telefono) || empty($email) || empty($redes_sociales) || empty($idiomas) || empty($oficio) || empty($habilidades) || empty($perfil_profesional) || empty($formacion_academica) || empty($descripcion)) {
        $error = "Por favor, complete todos los campos";
    } else {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO profesionista (foto, nombre, nacimiento, edad, genero, nacionalidad, telefono, email, redes_sociales, idiomas, oficio, habilidades, perfil_profesional, formacion_academica, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss", $foto, $nombre, $nacimiento, $edad, $genero, $nacionalidad, $telefono, $email, $redes_sociales, $idiomas, $oficio, $habilidades, $perfil_profesional, $formacion_academica, $descripcion);
        $stmt->execute();

        // Redireccionar a la página de inicio de sesión
        header("Location: ../HTML/inicioSeProfesionistas.html");
        exit;
    }
}

// Cerrar conexión
$conn->close();
?>

<!-- Mostrar errores -->
<?php if (isset($error)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php } ?>
