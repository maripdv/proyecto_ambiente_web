<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar o Eliminar Producto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/principal.css">
    
</head>

<body>
    
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <div class="container mt-5">
        <h1>Editar o Eliminar Producto</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Eliminar Producto</h2>
                <form action="servicios/producto/delete_product.php" method="POST">
                    <div class="form-group">
                        <label for="delete-id">ID del Producto a Eliminar:</label>
                        <input type="number" class="form-control" id="delete-id" name="delete-id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar Producto</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2>Editar Producto</h2>
                <form action="servicios/producto/edit_product.php" method="GET">
                    <div class="form-group">
                        <label for="edit-id">ID del Producto a Editar:</label>
                        <input type="number" class="form-control" id="edit-id" name="edit-id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar Producto</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-dark py-4 fixed-bottom">
        <div class="container text-center">
            <p>&copy; 2023 Mi Página Web. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>