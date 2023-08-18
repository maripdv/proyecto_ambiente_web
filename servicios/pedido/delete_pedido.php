<?php
    include_once("../_conexion.php");
    $response = new stdClass();
    $codped = $_POST["codped"];

    $sql = "delete from pedido where codped = $codped";
    $result = mysqli_query($conexion, $sql);

    if($result){
        $response->state = true;
        $response->detail = "Eliminado correctamente";
    }else{
        $response->state = false;
        $response->detail = "No se pudo eliminar";
    }

    mysqli_close($conexion);
    header('Content-Type: application/json');
    echo json_encode($response);
