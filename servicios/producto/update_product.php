<?php
include("../_conexion.php"); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit-id"])) {
    $codpro = $_POST["edit-id"];
    $nombre = $_POST["edit-nombre"];
    $descripcion = $_POST["edit-descripcion"];
    $precio = $_POST["edit-precio"];

    // Consulta para actualizar el producto
    $query = "UPDATE PRODUCTO SET nompro = ?, despro = ?, prepro = ? WHERE codpro = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "ssdi", $nombre, $descripcion, $precio, $codpro);

    if (mysqli_stmt_execute($stmt)) {
        // Producto actualizado exitosamente
        header("Location: ../../index.php");
    } else {
        // Error al actualizar el producto
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirige si el método no es POST o el ID no está definido
    header("Location: upd_del_produ.php");
    exit();
}

mysqli_close($conexion);
?>
