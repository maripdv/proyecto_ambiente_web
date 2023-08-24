<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/principal.css">
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <div class="content">
        <div>
            <h1>Tienda de Moda</h1>
            <p>Emprendimiento desarrollado y administrado por estudiantes del curso de Ambiente Web Cliente-Servidor
            </p>
        </div>
        <h2>PRODUCTOS</h2>
        <div class="contenido_principal">
            <div>
                <a href="mujer.php">
                    <img src="imagenes/women1.png" alt="destacado1">
                </a>
                <h4>Mujer</h4>
            </div>
            <div>
                <a href="hombre.php">
                    <img src="imagenes/men.png" alt="destacado2">
                </a>
                <h4>Hombre</h4>
            </div>
            <div>
                <a href="deportiva.php">
                    <img src="imagenes/sport1.png" alt="destacado3">
                </a>
                <h4>Deportiva</h4>
            </div>
        </div>
        <?php
        include_once("layouts/_main-footer.php");
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>