<?php
include("_conexion.php");
$emausu = $_POST["emausur"];
$nomusu = $_POST["nomusu"];
$apeusu = $_POST["apeusu"];
$sql = "SELECT * FROM usuario WHERE emausu = '$emausu'";
$result = mysqli_query($conexion, $sql);

if ($result) {
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        //en caso de que no encuentre un email igual (Puede crear)
        $pasusu = $_POST["pasusur"];
        $pasusu2 = $_POST["pasusu2r"];
        if ($pasusu != $pasusu2) {
            //3. Invalid password
            header('Location: ../registro.php?er=3');
        } else {
            $sql = "INSERT INTO USUARIO (codusu, nomusu, apeusu, emausu, pasusu, estado) VALUES ('', '$nomusu', '$apeusu', '$emausu', '$pasusu', '1')";
            $result = mysqli_query($conexion, $sql);
            //se esta pidiendo a mysql que devuelva el ultimo id insertado
            $codusu = mysqli_insert_id($conexion);
            session_start();
            $_SESSION["codusu"] = $codusu;
            $_SESSION["nomusu"] = $row["nomusu"];
            $_SESSION["apeusu"] = $row["apeusu"];
            $_SESSION["emausu"] = $emausu;
            $_SESSION["pasusu"] = $pasusu;
            header('Location: ../login.php');
        }
    } else {
        //2 Email invalido
        header('Location: ../registro.php?er=2');
    }
} else {
    //1. error de conexion
    header('Location: ../registro.php?er=1');
}
