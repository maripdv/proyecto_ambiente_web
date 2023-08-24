<?php
include("../_conexion.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codpro"])) {
    $codpro = $_POST["codpro"];

    // Delete the product from the database
    $sql = "DELETE FROM PRODUCTO WHERE codpro = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $codpro);

    if (mysqli_stmt_execute($stmt)) {
        // Product deleted successfully
        echo "Product deleted successfully.";
    } else {
        // Error in deleting product
        echo "Error deleting product: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
} else {
    // Invalid request method or missing parameters
    echo "Invalid request or missing parameters.";
}

mysqli_close($conexion);
?>
