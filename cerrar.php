<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a otra página deseada
header("Location: index.php");
exit();
?>