<nav id="navbar" class="navbar navbar-expand-lg static-top navbar-light p-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="imagenes/logo.png" alt="Logo de Gear Shop" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
            <div class="input-group">
                <span class="border-dark input-group-text bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input id="idbusqueda" type="text" class="form-control border-dark" style="color:black">
                <button class="btn btn-dark text-white" onclick="search_producto()">Buscar</button>
            </div>
        </div>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                <div class="input-group">
                    <span class="border-dark input-group-text bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input id="idbusqueda" type="text" class="form-control border-dark" style="color: black;">
                    <button class="btn btn-dark text-white" onclick="search_producto()">Buscar</button>
                </div>
            </div>

            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="html/deportiva.php">Deportiva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="html/hombre.php">Hombre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="html/mujer.php">Mujer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="html/acercade.php">Acerca de</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <?php
                if (isset($_SESSION["codusu"])) {
                    echo '<li class="nav-item">
                                    <a class="nav-link mx-2 text-uppercase" href="php/cerrar.php"><i class="fa-solid fa-sign-out me-1"></i>
                                        Cerrar Sesión</a>
                                </li>';
                } else {


                ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="login.php"><i class="fa-solid fa-circle-user me-1"></i>
                            Cuenta</a>
                    </li>
                    
                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="carrito.php"><i class="fa-solid fa-cart-shopping me-1"></i>
                        Carrito</a>
                </li>
            </ul>
        </div>
    </div>
</nav>