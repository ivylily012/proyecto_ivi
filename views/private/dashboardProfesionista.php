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
                <a class="nav-link active" aria-current="page" href="../HTML/sesion profesionista.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Solicitudes</a>
              </li>
                <a class="nav-link active" href="#">Acciones de pago</a>
            </ul>
            <div class="d-flex"  role="search">
              <button class="btn btn-dark mx-2" onclick="toggleNightMode()">Modo</button>
              <form class="d-flex" role="search">
                <button class="btn btn-dark" type="submit">Juan Escamia </button>
                <a href="#" class="text-dark ms-3">
                    <i class="bi bi-bell text-dark" style="font-size: 1.5rem;"></i>
              </a>
            </form>
          </div>
          </div>
        </div>
      </nav>

    <div class="container mt-5">
        <center><h3>Solicitudes de servicios </h3></center><!-- lleva imagen aqui -->
        <div class="row mt-4">
            <div class="col-md-3">

            <?php 
            include __DIR__.'../../db/conn.php';

            $data_base = new Database();
            $conn_database = $data_base->connect();

            try{
                $query_Profesionista = "";
                //Esta es la queri o sentecia SQL que debe de indicar en que tablas va a buscar que cosas, 
                $stmt = $conn_database->prepare($query_Profesionista); //Esta parte le indica que tome la query creada, y que tras preparar la conexion con la base de datos, lo maneje todo en la variable $stmt(Statemen)
                $stmt->execute(); //Esta parte ejecuta la busqueda, y se producen errores esta parte es la que lanza un error por que de aqui se salta hasta laperte de CATCH que esta mas adelante...

                $resultados_profesionista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //Si todo sale bien y los resultados estan listos, los datos son procesados por las funciones internade de PHP en realcion a las conexiones usando PDO lo que hace aqui es que los datos de la variable $stmt, los secciona en una array para ser impresos...

                //Esta condicional hace lo que dice, si el numero total de resultados es mayor a 0, se imprimeran todos los que encuentre, aqui no se han insertado regulaciones inmediatas ni manejadores ni paginados...
                if (count($resultados_profesionista) > 0){
                    //Como ya dijimos antes, a partir de la coindicional de arriba, se empezaran a imprimir los datos ordenados en la variable $resultados_profesionistas
                    foreach($resultados_profesionista as $row){
                        //Aqui le indicamos que cada resultado es una fila, esa fila puede contener n cantidad de informacion en esta caso...
            ?>
                <div class="card mb-4">
                    <img src="../IMG/<?php echo htmlspecialchars($row['fotografia']); ?>" alt="Alan">
            <?php 
            //como estan ordenados en arrelos (ARRAY's), y cada uno lo identifica como una fila, entonces empieza a pasar por cada uno, siendo la :key en nombre de la columna en la base de datos (A la columna se le llama PARAMETRO!)

            //y lo que se imprime es el :valor (o el contenido dentro de la celda en la columan)
            ?>        
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
                        <?php 
                         //El ciclo se repetira indefinidamente, por qu eno le hemos puesto un limite de impresiones, osea, que solo muestro 5 resultados o asi... eso se hara despues... espero XD
                        ?>
                        <p class="card-text">Mecanico</p>
                        <p class="card-text"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                        <a href="AQUI DEBERIA DE IR LA RUTA A SU PERFIL... ESTO ES OTRO ROLLO" class="btn btn-primary">Conoce más</a>
                    </div>
                </div>
            <?php       
                        }
                    } else {

                        //SI las condicionaes de la sentencia no se cumplen, lo unico se se imprimera es el mensaje de abajo, hasta que haya algo para ese usuario..
            ?>
                <p>No tenemos resultados para ti, por el momento.. :D</p>
            <?php         
                    }

                } catch(PDOException $e){
                    echo "Error: " .$e->getMessage();

                    //Arriba dije que si no funcionaba la sentencia SQL, o demas aqui se procesarin los errores y se imprimirian en la pantalla del usuario..
                    //mi recomendacion es que cuando sea esto una app como debe de ser, estos fallos se deben manejar en un archivo log..
                }
            ?>    
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