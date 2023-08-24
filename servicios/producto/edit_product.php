<?php
session_start();
?>
<?php
include("../_conexion.php"); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["edit-id"])) {
    $codpro = $_GET["edit-id"];

    // Consulta para obtener la información del producto
    $query = "SELECT * FROM PRODUCTO WHERE codpro = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $codpro);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $producto = mysqli_fetch_assoc($result);

    if ($producto) {
        // Producto encontrado, muestra los detalles y formulario de edición
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Producto</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            <link rel="stylesheet" href="../../css/agregar.css">
            <link rel="stylesheet" href="../../css/principal.css">
        </head>

        <body>
            <nav id="navbar" class="navbar navbar-expand-lg static-top navbar-light p-3 shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="../../imagenes/logo.png" alt="Logo de Gear Shop" class="navbar-logo">
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
                                <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="../../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2 text-uppercase" href="../../deportiva.php">Deportiva</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2 text-uppercase" href="../../hombre.php">Hombre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2 text-uppercase" href="../../mujer.php">Mujer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2 text-uppercase" href="../../acercade.php">Acerca de</a>
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
                                        <a class="nav-link mx-2 text-uppercase" href="../../agregarProducto.php"><i class="fa-solid fa-plus"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-2 text-uppercase" href="../../upd_del_produ.php"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_SESSION["codusu"])) {
                                echo '<li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="../../pedido.php">Historial</a>
                </li> ';
                            } else {
                            }

                            ?>
                        </ul>
                        <ul class="navbar-nav ms-auto ">
                            <?php
                            if (isset($_SESSION["codusu"])) {
                                echo '<li class="nav-item">
                                    <a class="nav-link mx-2 text-uppercase" href="../../cerrar.php"><i class="fa-solid fa-right-from-bracket"></i>
                                        </a>
                                </li>';
                            } else {


                            ?>
                                <li class="nav-item">
                                    <a class="nav-link mx-2 text-uppercase" href="../../login.php"><i class="fa-solid fa-circle-user me-1"></i>
                                        Login</a>
                                </li>

                            <?php
                            }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link mx-2 text-uppercase" href="../../carrito.php"><i class="fa-solid fa-cart-shopping me-1"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container mt-5">
                <h1 class="mb-4">Editar Producto</h1>
                <form action="update_product.php" method="POST">
                    <input type="hidden" name="edit-id" value="<?php echo $producto['codpro']; ?>">
                    <div class="mb-3">
                        <label for="edit-nombre" class="form-label">Nombre del Producto:</label>
                        <input type="text" class="form-control" id="edit-nombre" name="edit-nombre" value="<?php echo $producto['nompro']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="edit-descripcion" name="edit-descripcion" required><?php echo $producto['despro']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-precio" class="form-label">Precio:</label>
                        <input type="number" class="form-control" id="edit-precio" name="edit-precio" step="0.01" value="<?php echo $producto['prepro']; ?>" required>
                    </div>
                    <!-- Agrega más campos de edición según tus necesidades -->
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <?php
            include_once("../../layouts/_main-footer.php");
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>

<?php
    } else {
        // Producto no encontrado
        echo "Producto no encontrado.";
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirige si el método no es GET o el ID no está definido
    header("Location: upd_del_produ.php");
    exit();
}

mysqli_close($conexion);
?>