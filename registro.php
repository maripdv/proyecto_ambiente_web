<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registrarse</h2>
                        <form action="servicios/register.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nomusu" id="name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="apeusu" id="name" placeholder="Your Last Name" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="emausur" id="email" placeholder="Your Email" required/>
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pasusur" id="pass" placeholder="Password" required/>
                            </div>
                            <!-- Confirm password -->
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="pasusu2r" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <?php
                            if (isset($_GET["er"])) {

                                switch ($_GET["er"]) {

                                    case '1':

                                        echo "<p>Error de conexion</p>";

                                        break;

                                    case '2':

                                        echo "<p>El Email ya se encuentra registrado!</p>";

                                        break;

                                    case '3':

                                        echo "<p>Las contraseñas no coinciden</p>";

                                        break;
                                }
                            }
                            ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="imagenes/logo.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Ya tengo una cuenta</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    include_once("layouts/_main-footer.php");
    ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>

</body>

</html>