<?php
include("_conexion.php");
$emausu = $_POST["emausu"];
$sql = "SELECT * FROM usuario WHERE emausu = '$emausu'";
$result = mysqli_query($conexion, $sql);
if ($result) {
    $row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count!=0){
        $pasusu = $_POST["pasusu"];
        if($row["pasusu"]!=$pasusu){
            //3. Invalid password
            header('Location: ../login.php?e=3');
        }else{
            session_start();
            $_SESSION["codusu"] = $row["codusu"];
            $_SESSION["emausu"] = $row["emausu"];
            $_SESSION["nomusu"] = $row["nomusu"];
            header('Location: ../index.php');
        }
    }else{
        //2 Email invalido
        header('Location: ../login.php?e=2');
    }
} else {
    //1. error de conexion
    header('Location: ../login.php?e=1');
}
?>