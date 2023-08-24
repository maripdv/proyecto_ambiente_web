<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mujer</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/hombre.css" />
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <div class="main-content">
        <section>
            <div class="parte1">
                <img id="idimg" src="" alt="">
            </div>
            <div class="parte2">
                <h3 id="idtitle"></h3>
                <h1 id="idprice"><span></span></h1>

                <h4 id="iddesc"></h4>

                <button onclick="iniciar_compra()">Comprar</button>
            </div>
        </section>
    </div>
    <h2>Productos Relaciondos</h2>
    <div class="content-container" id="space-list">


    </div>

    <script type="text/javascript" src="js/main-scripts"></script>
    <script type="text/javascript">
        var p = '<?php echo $_GET["p"]; ?>';
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            $.ajax({
                url: "../servicios/producto/get_all_products.php",
                type: "POST",
                data: {
                    codcat: 3
                },
                success: function(data) {
                    console.log(data);
                    let html = "";
                    let productCodcat = null;
                    for (var i = 0; i < data.datos.length; i++) {
                        if (data.datos[i].codpro == p ) {
                            document.getElementById("idimg").src = "../imagenes/" + data.datos[i].rutimapro;
                            document.getElementById("idtitle").innerHTML = data.datos[i].nompro;
                            document.getElementById("idprice").innerHTML = formato_precio(data.datos[i].prepro);
                            document.getElementById("iddesc").innerHTML = data.datos[i].despro;
                            productCodcat = data.datos[i].codcat;
                        }
                    }
                    for (var i = 0; i < data.datos.length; i++) {
                if (data.datos[i].codcat == productCodcat) {  
                        html +=
                            '<div class="product-card">' +
                            '<a href="productoDeportiva.php?p=' + data.datos[i].codpro + '">' +
                            '<img src="../imagenes/' + data.datos[i].rutimapro + '">' +
                            '<h5>' + data.datos[i].nompro + '</h5>' +
                            '<p>' + formato_precio(data.datos[i].prepro) + '</p>' +
                            '<p>Categoría: ' + data.datos[i].codcat + '</p>' + // Mostrar el código de categoría
                            '<button class="btn btn-primary">Agregar al carrito</button>' +
                            '</a>' +
                            '</div>';
                    }
                }
                    document.getElementById("space-list").innerHTML = html;
                    console.log("Codcat del producto seleccionado:", productCodcat);
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

        function iniciar_compra() {
            $.ajax({
                url: "../servicios/compra/validar_inicio_compra.php",
                type: "POST",
                data: {
                    codpro: p
                },
                success: function(data) {
                    console.log(data);
                    if (data.state) {
                        alert(data.detail);
                    } else {
                        alert(data.detail);
                        if (data.open_login) {
                            open_login();
                        }
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function open_login() {
            window.location.href = "login.php";
        }
    </script>
    <?php
    include_once("layouts/_main-footer.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>