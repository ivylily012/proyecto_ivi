<?php
require_once '../db/conn.php';

try {
    $data_base = new Database();
    $conn_database = $data_base->connect();

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['psswrd']);

    // Validación de campos
    if(!$email || empty($password)){
        $responde['error'] = 'Todos los campos son obligatorios y el email debe ser válido';
        echo json_encode($responde);
        exit;
    }

    $query = "SELECT * FROM registros WHERE email = :email";
    $stmt = $conn_database->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Si el email existe, verifica la contraseña
    if($stmt->rowCount() > 0){
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $usuario['psswrd'])){
            // Si la contraseña es correcta, inicia sesión
            session_start();
            $_SESSION['usuario'] = $usuario['id'];
            
            // Redireccionar según el rol
            $rol = $usuario['rol'];
            switch($rol) {
                //Dependiendo del tipo de registro hecho por el usuario, este sera redirigido a una seccion especial ed el, si es cliente, solo ira  a la parte del cliente, si es Admin, al CRUD del admin, y asi sucesibamente

                case 'cliente':
                    $responde['redirect'] = '../HTML/SesionCliente.html';
                    break;
                case 'profesionista':
                    $responde['redirect'] = '../HTML/sesion profesionista.html';
                    break;
                case 'empresa':
                    $responde['redirect'] = '../HTML/Seseion empre.html';
                    break;
                case 'admin':
                    $responde['redirect'] = '../HTML/sesionadmin.html';
                    break;
                default:
                    $responde['error'] = 'Rol no reconocido';
                    echo json_encode($responde);
                    exit;
            }

            $responde['success'] = 'Inicio de sesión exitoso';
        } else {
            $responde['error'] = 'Contraseña incorrecta';
            // Implementar un contador para bloquear la cuenta después de 3 intentos fallidos
        }
    } else {
        $responde['error'] = 'El email no existe';
    }

echo json_encode($responde);

//Esto redirige a la pagina desea a partir del tipo de registro que hizo el usuario... no necesita sleccionar que e sque...

    if(isset($responde['success'])){
        header("Location: ".$responde['redirect']);
        exit;
    }

} catch(PDOException $e){
    echo 'Error al concetarse'.$e->getMessage();
}

?>