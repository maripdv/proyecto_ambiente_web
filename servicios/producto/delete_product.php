<?php
include("../_conexion.php"); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete-id"])) {
    $codpro = $_POST["delete-id"];

    // Consulta para eliminar el producto
    $query = "DELETE FROM PRODUCTO WHERE codpro = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $codpro);

    if (mysqli_stmt_execute($stmt)) {
        // Producto eliminado exitosamente
        header("Location: ../../index.php");
    } else {
        // Error al eliminar el producto
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirige si el método no es POST o el ID no está definido
    header("Location: upd_del_produ.php");
    exit();
}

mysqli_close($conexion);
?>
