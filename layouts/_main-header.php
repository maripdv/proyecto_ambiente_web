<nav id="navbar" class="navbar navbar-expand-lg static-top navbar-light p-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="imagenes/logo.png" alt="Logo de Gear Shop" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                <div class="input-group">
                    <span class="border-dark input-group-text bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input id="idbusqueda" type="text" class="form-control border-dark" style="color: black;" placeholder="Busca lo que necesitas.." value="<?php if (isset($_GET['text'])) {
                                                                                                                                                                echo $_GET['text'];
                                                                                                                                                            } else {
                                                                                                                                                                echo '';
                                                                                                                                                            } ?>">
                    <button class="btn btn-dark text-white" onclick="search_producto()">Buscar</button>
                </div>
            </div>

            <ul class="navbar-nav ms-auto ">

                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="deportiva.php">Deportiva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="hombre.php">Hombre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="mujer.php">Mujer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="acercade.php">Acerca de</a>
                </li>
                <?php
                // Lista blanca de correos electrónicos permitidos
                $correosPermitidos = array("correo@example.com");

                // Verifica si el usuario está autenticado
                if (isset($_SESSION["emausu"])) {
                    // Verifica si el correo electrónico del usuario está en la lista blanca
                    if (in_array($_SESSION["emausu"], $correosPermitidos)) {
                        // El usuario está autorizado, muestra los enlaces del menú
                ?>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="agregarProducto.php"><i class="fa-solid fa-plus"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="upd_del_produ.php"><i class="fa-regular fa-pen-to-square"></i></a>
                        </li>
                <?php
                    }
                }
                ?>
                <?php
                if (isset($_SESSION["codusu"])) {
                    echo '<li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="pedido.php">Historial</a>
                </li> ';
                } else {
                }

                ?>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <?php
                if (isset($_SESSION["codusu"])) {
                    echo '<li class="nav-item">
                                    <a class="nav-link mx-2 text-uppercase" href="cerrar.php"><i class="fa-solid fa-right-from-bracket"></i>
                                        </a>
                                </li>';
                } else {


                ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="login.php"><i class="fa-solid fa-circle-user me-1"></i>
                            Login</a>
                    </li>

                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="carrito.php"><i class="fa-solid fa-cart-shopping me-1"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>