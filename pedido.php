<?php
session_start();
if (!isset($_SESSION['codusu'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hombre</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hombre.css" />
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <div class="main-content">
        <div class="content-page">
            <h3>Historial de Compras</h3>
            <div class="body-pedidos" id="space-list">
            </div>
            <div class="p-line"></div>
            <div class="p-line"></div>
            <div class="p-line"></div>
        </div>
        <script type="text/javascript" src="js/main-scripts"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajax({
                    url: "servicios/pedido/get_procesados.php",
                    type: "POST",
                    data: {},
                    success: function(data) {
                        console.log(data);
                        let html = "";
                        let monto = 0;
                        for (var i = 0; i < data.datos.length; i++) {
                            html +=
                                '<div class="item-pedido">' +
                                '<div class="pedido-img">' +
                                '<img src="imagenes/' + data.datos[i].rutimapro + '">' +
                                '</div>' +
                                '<div class="pedido-detalle">' +
                                '<h3>' + data.datos[i].nompro + '</h3>' +
                                '<p><b>Precio:</b> ' + data.datos[i].prepro + '</p>' +
                                '<p><b>Precio:</b> ' + data.datos[i].fecped + '</p>' +
                                '<p><b>Estado:</b> ' + data.datos[i].estado + '</p>' +
                                '<p><b>Direccion:</b> ' + data.datos[i].dirusuped + ' </p>' +
                                '<p><b>Telefono:</b>' + data.datos[i].telusuped + ' </p>' +
                                '</div>' +
                                '</div>';
                         
                        }
                        document.getElementById("space-list").innerHTML = html;
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        </script>
    </div>
    
</body>

</html>