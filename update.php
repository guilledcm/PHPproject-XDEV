<?php
include 'db.php';

$itemId = $_GET['id'];
$newName = $_GET['name'];


$sql = "UPDATE items SET name='$newName' WHERE item_id=$itemId";

if ($conn->query($sql) === TRUE) {
    echo "Nombre actualizado correctamente";
} else {
    echo "Error al actualizar el nombre: " . $conn->error;
}

$conn->close();
?>
