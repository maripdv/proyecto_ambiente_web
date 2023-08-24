<?php
include("../_conexion.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];
    $rutimapro = $_POST["imagen"]; // Get the image path directly from the input

    $estado = 1; // Set the estado to 1

    // Insert product data into the database
    $sql = "INSERT INTO PRODUCTO (nompro, despro, prepro, rutimapro, estado, codcat) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssdsii", $nombre, $descripcion, $precio, $rutimapro, $estado, $categoria); // Change "d" to "s" for rutimapro

    if (mysqli_stmt_execute($stmt)) {
        // Product inserted successfully
        header("Location: ../../agregarProducto.php");;
    } else {
        // Error in inserting product
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
} else {
    // Invalid request method
    echo "Método no permitido";
}

mysqli_close($conexion);
