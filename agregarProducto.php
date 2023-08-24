<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/agregar.css">
    <link rel="stylesheet" href="css/principal.css">
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>

    <div class="container mt-5">
        <h1 class="mb-4">Agregar Producto</h1>
        <form action="servicios/producto/agregar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="imagen">Ruta Imagen:</label>
                <input type="text" class="form-control" id="imagen" name="imagen" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="" disabled selected>Selecciona una categoría</option>
                    <?php
                    include("servicios/_conexion.php"); // Include your database connection file

                    $query = "SELECT * FROM CATEGORIA"; // Assuming your table name is "CATEGORIA"
                    $result = mysqli_query($conexion, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['codcat'] . '">' . $row['nomcat'] . '</option>';
                    }

                    mysqli_close($conexion);
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
    </div>
    <?php
    include_once("layouts/_main-footer.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>