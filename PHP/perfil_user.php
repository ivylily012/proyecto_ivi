<?php
require_once '../db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'perfil_usuario');

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['name'];
    $nombre_usuario = $_POST['username'];
    $pronombres = $_POST['pronouns'];
    $descripcion_corta = $_POST['bio'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];

    // Procesar la imagen
    $imagen_perfil = '';
    if ($_FILES['profile-picture']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile-picture"]["name"]);
        if (move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $target_file)) {
            $imagen_perfil = $target_file;
        }
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, nombre_usuario, pronombres, descripcion_corta, instagram, youtube, imagen_perfil)
            VALUES ('$nombre', '$nombre_usuario', '$pronombres', '$descripcion_corta', '$instagram', '$youtube', '$imagen_perfil')";

    if ($conn->query($sql) === TRUE) {
        echo "Perfil guardado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>