<?php
session_start();
if (!isset($_SESSION['codusu'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hombre</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/hombre.css" />
    <script src="https://www.paypal.com/sdk/js?client-id=AQomRl1-OF1f9O43UVn6u3tAUHu0h_1Lns5_beT0F430ZZ3DFsHvJUio_VXHjESelMhq2MigStqjpBTH&currency=USD"></script>
    </script>
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <div class="main-content">
        <div class="content-page">
            <h3>Mis pedidos</h3>
            <div class="body-pedidos" id="space-list">
            </div>
            <input class="ipt-procom" type="text" id="dirusu" placeholder="Direccion">
            <br>
            <input class="ipt-procom" type="text" id="telusu" placeholder="Telefono">
            <br>
            <!--button onclick="procesar_compra()">Procesar Compra</button>-->
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajax({
                    url: "servicios/pedido/get_porprocesar.php",
                    type: "POST",
                    data: {},
                    success: function(data) {
                        console.log(data);
                        let html = "";
                        window.sumaMonto = 0;
                        for (var i = 0; i < data.datos.length; i++) {
                            html +=
                                '<div class="item-pedido">' +
                                    '<div class="pedido-img">' +
                                        '<img src="imagenes/' + data.datos[i].rutimapro + '">' +
                                    '</div>' +
                                '<div class="pedido-detalle">' +
                                    '<h3>' + data.datos[i].nompro + '</h3>' +
                                    '<p><b>Precio:</b> ' + data.datos[i].prepro + '</p>' +
                                    '<p><b>Fecha:</b> ' + data.datos[i].fecped + '</p>' +
                                    '<p><b>Estado:</b> ' + data.datos[i].estado + '</p>' +
                                    '<p><b>Direccion:</b> ' + data.datos[i].dirusuped + ' </p>' +
                                    '<p><b>Telefono:</b>' + data.datos[i].telusuped + ' </p>' +
                                    '<button class="btn-detele-cart" onclick="delete_product('+data.datos[i].codped+')">Eliminar</button>' +
                                '</div>' +
                            '</div>';
                            sumaMonto += parseFloat(data.datos[i].prepro);
                        }

                        document.getElementById("space-list").innerHTML = html;

                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        </script>
        <div id="paypal-button-container"></div>
        <script>

            function delete_product(codped){
                $.ajax({
                    url: "servicios/pedido/delete_pedido.php",
                    type: "POST",
                    data: {
                        codped: codped
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.state) {
                            alert("Producto eliminado");
                            window.location.reload();
                        } else {
                            alert(data.detail);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }


            function procesar_compra() {
                let dirusu = document.getElementById("dirusu").value;
                let telusu = $("#telusu").val();
                if (dirusu === "" || telusu === "") {
                    alert("Debe ingresar todos los campos");
                } else {
                    $.ajax({
                        url: "servicios/pedido/confirm.php",
                        type: "POST",
                        data: {
                            dirusu: dirusu,
                            telusu: telusu
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.state) {
                                alert("Compra realizada con éxito");
                                window.location.href = "pedido.php";
                            } else {
                                alert(data.detail);
                            }
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }
            }

            function validateFields() {
                let dirusu = document.getElementById("dirusu").value;
                let telusu = $("#telusu").val();
                if (dirusu === "" || telusu === "") {
                    alert("Debe ingresar todos los campos");
                    return false;
                } else {
                    return true;
                }
            }

            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            title: {
                                value: "Compra de productos"
                            },
                            currency: {
                                value: "USD"
                            },
                            amount: {
                                value: window.sumaMonto
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    if (validateFields()) {
                        return actions.order.capture().then(function(details) {
                            alert('Pago realizado');
                            procesar_compra(); // Llama a procesar_compra solo si los campos están llenos
                            window.location.href = "index.php";
                            console.log(details);
                        });
                    }
                },
                onCancel: function(data) {
                    alert('Pago cancelado');
                    console.log(data);
                }
            }).render('#paypal-button-container');

            // Deshabilitar el botón de PayPal inicialmente
            let paypalButton = document.querySelector("#paypal-button-container > *");
            paypalButton.disabled = true;

            // Agregar un evento de escucha para habilitar el botón de PayPal si los campos están llenos
            document.getElementById("dirusu").addEventListener("input", checkFields);
            document.getElementById("telusu").addEventListener("input", checkFields);

            function checkFields() {
                let dirusu = document.getElementById("dirusu").value;
                let telusu = $("#telusu").val();
                if (dirusu !== "" && telusu !== "") {
                    paypalButton.disabled = false;
                } else {
                    paypalButton.disabled = true;
                }
            }
        </script>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>