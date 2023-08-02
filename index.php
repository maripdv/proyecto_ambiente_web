<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
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
        <h2>OFERTAS</h2>
        <div class="contenido_principal">
            <div>
                <a href="ofertas.html">
                    <img src="imagenes/destacado.png" alt="destacado1">
                </a>
                <h4>Ofertas Mujer</h4>
            </div>
            <div>
                <a href="ofertas.html">
                    <img src="imagenes/destacado2.png" alt="destacado2">
                </a>
                <h4>Ofertas Hombre</h4>
            </div>
            <div>
                <a href="ofertas.html">
                    <img src="imagenes/destacado3.png" alt="destacado3">
                </a>
                <h4>Ofertas Deportiva</h4>
            </div>
            <div>
                <a href="ofertas.html">
                    <img src="imagenes/destacado4.png" alt="destacado4">
                </a>
                <h4>Nuevo Ingreso</h4>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

    <footer>

    </footer>
</body>

</html>