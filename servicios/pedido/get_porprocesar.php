<?php
include("../_conexion.php");
$response = new stdClass();

function estado2texto($id)
{
    switch ($id) {
        case '1':
            return 'Por procesar';
            break;
        case '2':
            return 'Orden completeda';
            break;
        default:
            break;
    }
}

$datos = [];
$i = 0;
$sql = "SELECT *, ped.estado estadoped FROM pedido ped
        inner join producto pro on ped.codpro = pro.codpro
        where ped.estado =1";
$resultado = mysqli_query($conexion, $sql);
while ($fila = mysqli_fetch_array($resultado)) {
    $obj = new stdClass();
    $obj->codped = $fila['codped'];
    $obj->codpro = $fila['codpro'];
    $obj->nompro = utf8_encode($fila['nompro']);
    $obj->fecped = $fila['fecped'];
    $obj->rutimapro = $fila['rutimapro'];
    $obj->prepro = $fila['prepro'];
    $obj->dirusuped = utf8_encode($fila['dirusuped']);
    $obj->telusuped = $fila['telusuped'];
    $obj->estado = estado2texto($fila['estadoped']);
    $datos[$i] = $obj;
    $i++;
}
$response->datos = $datos;
mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);
