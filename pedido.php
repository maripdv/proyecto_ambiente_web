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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/hombre.css" />
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <div class="main-content">
        <div class="content-page">
            <h3>Mi carrito</h3>
            <div class="body-pedidos" id="space-list">
            </div>
            <h3>Datos de pago</h3>
            <div class="p-line"></div>MONTO TOTAL:<div>$<span id="montototal"></span></div>
            <div class="p-line"></div>N° Cuenta:<div>1-9231273-008</div>
            <div class="p-line"></div>Representante:<div>Encargado de ventas</div>
            <p><b>NOTA:</b>Para confirmar la compra debe realizar el deposito por el monto toal y enviar el comprobante al siguiente correo example@correo.com o al numero de wa 90u3123</p>
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
                            if (data.datos[i].estado == "Por pagar") {
                                monto += parseFloat(data.datos[i].prepro);
                            }

                        }


                        document.getElementById("montototal").innerHTML = monto;
                        document.getElementById("space-list").innerHTML = html;
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        </script>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>