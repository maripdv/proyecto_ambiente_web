<!DOCTYPE html>
<html>

<head>
    <title>Hombre</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/hombre.css" />

</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg static-top navbar-light p-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../imagenes/logo.png" alt="Logo de Gear Shop" class="navbar-logo">
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
                        <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="../html/deportiva.php">Deportiva</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="../html/hombre.php">Hombre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="../html/mujer.php">Mujer</a>
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
                            <a class="nav-link mx-2 text-uppercase" href="html/login.html"><i class="fa-solid fa-circle-user me-1"></i>
                                Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-uppercase" href="html/login.html"><i class="fa-solid fa-circle-user me-1"></i>
                                Registrarse</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="../carrito.php"><i class="fa-solid fa-cart-shopping me-1"></i>
                            Carrito</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>Camisas Hombre</h2>
    <div class="content-container" id="space-list">

        <!-- Repite el mismo código para los siguientes productos -->
    </div>
    <script type="text/javascript" src="../js/main-scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: "../servicios/producto/get_all_products.php",
                type: "POST",
                data: {},
                success: function(data) {
                    console.log(data);
                    let html = "";
                    for (var i = 0; i < data.datos.length; i++) {
                        html +=
                            '<div class="product-card">' +
                            '<a href="../producto.php?p=' + data.datos[i].codpro + '">' +
                            '<img src="../imagenes/' + data.datos[i].rutimapro + '">' +
                            '<h5>' + data.datos[i].nompro + '</h5>' +
                            '<p>' + formato_precio(data.datos[i].prepro) + '</p>' +
                            '<button class="btn btn-primary">Agregar al carrito</button>' +
                            '</div>';
                    }
                    document.getElementById("space-list").innerHTML = html;
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        function formato_precio(valor) {
            let svalor = valor.toString();
            let array = svalor.split(".");
            return "$" + array[0] + ".<span>" + array[1] + "</span>";
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>