<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-purple {
            background-color: #6f42c1; /* Color morado */
            border-color: #6f42c1;     /* Color morado */
        }

        .btn-purple:hover {
            background-color: #5936a2; /* Color morado oscuro para el hover */
            border-color: #5936a2;
        }

        .full-height {
            height: 100vh;
        }

        .image-side {
            background-image: url('../IMG/regiscliente.jpg');
            background-size: cover;
            background-position: center;
        }

        .form-side {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-box {
            width: 100%;
            max-width: 400px;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php 
    include '../inc/navBar.php';
    ?>

    <div class="container-fluid">
        <div class="row full-height">
            <!-- Formulario -->
            <!-- AGREGAR NAMES A LOS INPUTS-->
            <div class="col-md-6 form-side">
                <div class="form-box">
                  <h4 class="text-center mb-4">Registro de Cliente</h4>
                  <form action="../func/regUsr.php" method="post" enctype="multipart/form-data" onsubmit="establecerRol()">
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required>
                    </div>
                    <div class="mb-3">
                      <label for="apellido" class="form-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Escribe tus apellidos" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Gmail</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico de Gmail" required>
                    </div>
                    <div class="mb-3">
                      <label for="psswrd" class="form-label">Contraseña</label>
                      <input type="password" class="form-control" name="psswrd" id="psswrd" placeholder="Contraseña" required>
                    </div>
                    <div class="mb-3">
                      <label for="verificar-psswrd" class="form-label">Verificación de Contraseña</label>
                      <input type="password" class="form-control" name="verificar-psswrd" id="verificar-psswrd" placeholder="Repite tu contraseña" required>
                    </div>
                    <select name="rol">
                        <option value="cliente">Cliente</option>
                        <option value="profesionista">Profesionista</option>
                        <option value="empresa">Empresa</option>
                        <option value="admin">Admin</option>
                    </select>

                    <button class="my-form__button" type="submit">
                      Registrar
                    </button>
                    <div class="my-form__actions">
                      <div class="my-form__row_Cuenta">
                        <span>¿Ya tienes cuenta?</span>
                        <a href="../HTML/inicioSesion.html" title="Reset Password">
                          Inicia Sesión
                        </a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <!-- Imagen -->
            <div class="col-md-6 image-side"></div>
        </div>
    </div>

    <?php 
        include '../inc/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
