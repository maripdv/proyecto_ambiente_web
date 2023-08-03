<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hombre.css" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
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

    <div class="main">



        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="imagenes/logo.png" alt="sing up image"></figure>
                        <a href="registro.php" class="signup-image-link">Crear una cuenta</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Iniciar Sesion</h2>
                        <form action="servicios/login.php" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="emausu" id="your_name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pasusu" id="your_pass" placeholder="Password" />
                            </div>

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
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Ingresar" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>