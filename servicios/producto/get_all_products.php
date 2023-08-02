<?php
include("../_conexion.php");
$response = new stdClass();

$datos = [];
$i = 0;
$sql = "SELECT * FROM producto where estado =1";
$resultado = mysqli_query($conexion, $sql);
while ($fila = mysqli_fetch_array($resultado)) {
    $obj = new stdClass();
    $obj->codpro = $fila['codpro'];
    $obj->nompro = $fila['nompro'];
    $obj->despro = $fila['despro'];
    $obj->prepro = $fila['prepro'];
    $obj->rutimapro = $fila['rutimapro'];
    $datos[$i] = $obj;
    $i++;
}
$response->datos = $datos;
mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);
?>