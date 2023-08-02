<?php
session_start();
$response = new stdClass();
include_once("../_conexion.php");

$codusu = $_SESSION['codusu'];
$dirusu = $_POST['dirusu'];
$telusu = $_POST['telusu'];


$sql = "UPDATE PEDIDO SET dirusuped = '$dirusu', telusuped = '$telusu', estado = 2
        WHERE estado = 1";
$result = mysqli_query($conexion, $sql);
if ($result) {
    $response->state = true;
} else {
    $response->state = false;
    $response->detail = "No se actualizar el producto. Intente mas tarde";
}
mysqli_close($conexion);


header('Content-Type: application/json');
echo json_encode($response);
