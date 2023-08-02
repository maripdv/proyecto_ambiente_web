<?php
session_start();
$response = new stdClass();
if (!isset($_SESSION['codusu'])) {

    $response->state = false;
    $response->detail = "No ha iniciado sesión";
    $response->open_login = true;
} else {
    include_once("../_conexion.php");
    $codusu = $_SESSION['codusu'];
    $codpro = $_POST['codpro'];
    $sql = "INSERT INTO PEDIDO (codusu, codpro, fecped, estado, dirusuped, telusuped) 
            VALUES ($codusu, $codpro, now(),1 ,'','')";
    $result = mysqli_query($conexion, $sql);
    if ($result) {
        $response->state = true;
        $response->detail = "Producto agregado al carrito";
    }else{
        $response->state = false;
        $response->detail = "No se agrego el producto. Intente mas tarde";
    }
    mysqli_close($conexion);
}

header('Content-Type: application/json');
echo json_encode($response);
