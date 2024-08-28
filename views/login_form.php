<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesion para Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../IMG/mini.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/inicioCliente.css">
</head>
<body class="BoddyDos">
    <div class="form-wrapper">
        <main class="form-side">
            <form form action="../func/login.php" method="post" class="my-form">
                <div class="form-welcome-row">  
                    <h1>BIENVENIDO A JOBCRAFTER</h1>
                    <h2>Inicia Sesión</h2>
                </div>

                <div class="text-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" autocomplete="off" placeholder="@gmail.com" required>
                </div>
                
                <div class="text-field">
                    <label for="psswrd">Contraseña</label>
                    <input id="psswrd" type="password" name="psswrd" placeholder="********">
                    <div class="error-message">Mínimo 6 caracteres, al menos 1 alfabeto y 1 número</div>
                </div>

                <button class="my-form__button" type="submit">
                    Inicia Sesión
                </button>
                
                <div class="my-form__actions">
                    <div class="my-form__row_Cuenta">
                        <span>¿No tienes cuenta?</span>
                        <a href="../HTML/forRegis.html" title="Reset Password">
                           Registratre
                        </a>
                    </div>
                </div>
            </form>
        </main>
        <aside class="info-side"></aside>
    </div>
    
</body>
</html>