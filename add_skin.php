<?php
include 'db.php';

if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image_url'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = floatval($_POST['price']); 
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);

    $sql = "INSERT INTO items (name, description, price, image_url) VALUES ('$name', '$category', $price, '$image_url')";


    if (mysqli_query($conn, $sql)) {
        echo "Nueva skin agregada correctamente";
    } else {
        echo "Error al agregar la skin: " . mysqli_error($conn);
    }
} else {
    echo "Error: Se esperaban datos del formulario";
}

mysqli_close($conn);
?>
