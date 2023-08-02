<!DOCTYPE html>
<html>

<head>
    <title>Hombre</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hombre.css" />
    <style type="text/css">
        form {
            max-width: 460px;
            width: calc(100% - 40px);
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        form h3 {
            margin: 5px 0;

        }

        form input {
            padding: 7px 10px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
        }

        form button {
            margin: 10px 15px;
            width: calc(100%);
            background-color: blue;
        }

        form p{
            margin: 0;
            margin-bottom: 5px;
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg static-top navbar-light p-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="imagenes/logo.png" alt="Logo de Gear Shop" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="main-content">
        <div class="content-page">
            <form action="servicios/login.php" method="POST">
                <h3>Iniciar Sesión</h3>
                <input type="text" name="emausu" placeholder="Correo">
                <input type="password" name="pasusu" placeholder="Contraseña">
                <?php
                    if(isset($_GET["e"])){
                        switch ($_GET["e"]) {
                            case '1':
                                echo "<p>Error de conexion</p>";
                                break;
                            case '2':
                                echo "<p>Correo invalido</p>";
                                break;
                            case '3':
                                echo "<p>Contraseña invalida</p>";
                                break;
                        }
                    }
                ?>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>