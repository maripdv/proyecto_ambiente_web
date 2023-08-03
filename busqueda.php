<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hombre</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/hombre.css" />

</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <h2>Resultados para: <strong>"<?php echo $_GET['text']; ?>"</strong></h2>
    <div class="content-container" id="space-list">

        <!-- Repite el mismo código para los siguientes productos -->
    </div>
    <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
        var text = "<?php echo $_GET['text']; ?>";
        $(document).ready(function() {
            $.ajax({
                url: "servicios/producto/get_all_results.php",
                type: "POST",
                data: {
                    text:text
                },
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
                    if(html==''){
                        document.getElementById("space-list").innerHTML = "No hay resultados";
                    }else{
                        document.getElementById("space-list").innerHTML = html;
                    }
                    
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