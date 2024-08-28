<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobcrafters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
      body.night-mode {
          background-color: #222325  ;
          color: #ffffff;
      }

      .navbar.night-mode {
          background-color: #222325 ;
      }

      .card.night-mode {
          background-color: #222325  ;
          color: #ffffff;
      }

      .btn-toggle-mode {
          position: fixed;
          top: 20px;
          right: 20px;
          z-index: 1000;
      }

      .night-mode {
      background-color: #222325   !important;
      color: white !important;
  }
  .night-mode-text {
      color: white !important;
  }
  
  .night-mode .btn {
      background-color: rgb(83, 80, 80) !important;
      color: black !important;
  }
  .night-mode .btn:hover {
      background-color: grey !important;
      color: rgb(244, 229, 229) !important;
  }
  
      </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="../HTML/Index.html">Jobcrafters</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../HTML/sesionadmin.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Reportes</a>
              </li>
                <a class="nav-link active" href="#">Perfiles</a>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Acciones de pago</a>
                  </li>
            </ul>
            <div class="d-flex"  role="search">
              <button class="btn btn-dark mx-2" onclick="toggleNightMode()">Modo</button>
              <form class="d-flex" role="search">
                <button class="btn btn-dark" type="submit">Admin 1 </button>
                <a href="#" class="text-dark ms-3">
                 <i class="bi bi-bell text-dark" style="font-size: 1.5rem;"></i>
              </a>
            </form>
          </div>
          </div>
        </div>
      </nav>

    <div class="container mt-5">
        <center><h3>Perfiles Reportados </h3></center><!-- lleva imagen aqui -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/9.png" class="card-img-top" alt="Alan">
                    <div class="card-body">
                        <h5 class="card-title">Google</h5>
                        <p class="card-text">Violación de datos y privacidad</p>
                        <p class="card-text">Manejo inadecuado de la información personal de los clientes, Contenido inapropiado o información falsa que viola las políticas de Google.</p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/10.png" class="card-img-top" alt="Amanda">
                    <div class="card-body">
                        <h5 class="card-title">Javier Mendoza</h5>
                        <p class="card-text">Cortocircuito por mala conexión</p>
                        <p class="card-text">El perfil contiene información incorrecta o engañosa sobre los servicios ofrecidos por el electricista, se encontraron cables malos.</p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/11.png" class="card-img-top" alt="Carlos">
                    <div class="card-body">
                        <h5 class="card-title">Fanta</h5>
                        <p class="card-text">Producto defectuoso</p>
                        <p class="card-text"> Bebidas que no cumplen con los estándares de calidad, como mal sabor, mal olor, o defectos en el envase.</p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/13.png" class="card-img-top" alt="Marcos">
                    <div class="card-body">
                        <h5 class="card-title">Marcela Barahona</h5>
                        <p class="card-text">Trabajo mal echo</p>
                        <p class="card-text"> Si las prendas confeccionadas o reparadas presentan defectos como costuras sueltas, malos acabados, o problemas de ajuste.</p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <center><h3>Solicitudes de empleo</h3></center>    <!-- lleva imagen aqui -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/5.png" class="card-img-top" alt="Alan">
                    <div class="card-body">
                        <h5 class="card-title">Alan Mendez</h5>
                        <p class="card-text">Asistente de Ventas de Soluciones Informáticas</p>
                        <p class="card-text">Tengo experiencia en ventas y estoy interesado/a en unirme a su equipo para promover y vender soluciones informáticas a clientes empresariales.  </p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/6.png" class="card-img-top" alt="Amanda">
                    <div class="card-body">
                        <h5 class="card-title">Amanda Cerrano</h5>
                        <p class="card-text">Tester de Juegos y Aplicaciones</p>
                        <p class="card-text">Como aficionada a los videojuegos y las aplicaciones, estoy interesada en probar y dar retroalimentación sobre juegos y aplicaciones desarrolladas por su empresa. </p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/7.png" class="card-img-top" alt="Marcos">
                    <div class="card-body">
                        <h5 class="card-title">Marcos Medina</h5>
                        <p class="card-text">Content Creator Tecnológico</p>
                        <p class="card-text">Soy un creador de contenido apasionado por la tecnología y estoy interesado/a en colaborar con su empresa para desarrollar contenido multimedia creativo. </p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="../IMG/8.png" class="card-img-top" alt="Carlos">
                    <div class="card-body">
                        <h5 class="card-title">Carlos Munjia</h5>
                        <p class="card-text">Tester de Software Beta</p>
                        <p class="card-text">Soy un entusiasta de la tecnología interesado en colaborar como tester de software beta para su empresa, tengo experiencia en probar versiones preliminares de software.</p>
                        <a href="#" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include '../../inc/footer.php';
    ?>
      <script src="../JS/modo noche.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
    </html>
    