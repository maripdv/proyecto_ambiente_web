<?php
include("../_conexion.php");
$response = new stdClass();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["codcat"])) {
        $codcat = $_POST["codcat"];

        $datos = [];
        $i = 0;
        $sql = "SELECT * FROM producto WHERE codcat = ? AND estado = 1";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $codcat);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        while ($fila = mysqli_fetch_array($resultado)) {
            $obj = new stdClass();
            $obj->codpro = $fila['codpro'];
            $obj->nompro = $fila['nompro'];
            $obj->despro = $fila['despro'];
            $obj->prepro = $fila['prepro'];
            $obj->rutimapro = $fila['rutimapro'];
            $obj->codcat = $fila['codcat'];
            $datos[$i] = $obj;
            $i++;
        }

        $response->datos = $datos;
    } else {
        $response->error = "Código de categoría no proporcionado";
    }
} else {
    $response->error = "Método no permitido";
}

mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);
?>