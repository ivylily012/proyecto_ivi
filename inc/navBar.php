<?php
define('BASE_URL', '/proyecto_ivi/');
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="../HTML/Index.html" translate="no" >Jobcrafters</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./HTML/directorio_ofi.html">Directorio de Oficios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./HTML/sobreNosotros.html">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./HTML/contactanos.html">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <!-- Formulario de búsqueda -->
                    <!-- ESTE BUSCADOR NO CONTIENE CONTROILADOR, HAGANSELO-->
                    <form form action="buscador.php" method="post" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-outline-dark" type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a class="btn btn-outline-dark me-2" type="button" href="<?php echo BASE_URL; ?>/views/login_form.php">Iniciar sesión</a>
                <a class="btn btn-primary" type="button" href="<?php echo BASE_URL; ?>/views/singUp_form.php">Registrarse</a>

                <!-- Dropdown del ícono de usuario -->
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li class="dropdown-item">
                        <div id="google_translate_element" className="z-50 bg-white bottom-0 right-0 fixed"></div>
                            <!-- <div class="dropdown d-flex align-items-center">
                                <i class="bi bi-globe me-2"></i>
                                <a href="#" class="dropdown-toggle" id="idiomaDropdown" data-bs-toggle="dropdown" aria-expanded="false">Idioma</a>
                                <ul class="dropdown-menu" aria-labelledby="idiomaDropdown">
                                    <li><a class="dropdown-item idioma" href="#" data-lang="en">Inglés</a></li>
                                    <li><a class="dropdown-item idioma" href="#" data-lang="de">Alemán</a></li>
                                </ul>
                            </div> -->
                        </li>
                        <li>
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                <span><i class="bi bi-moon-fill me-2"></i> Fondo oscuro</span>
                                <label class="switch">
                                    <input type="checkbox" id="darkModeToggle">
                                    <span class="slider"></span>
                                </label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>