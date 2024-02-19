<?php
include 'db.php';

$itemId = $_GET['id'];

$sql = "DELETE FROM items WHERE item_id = $itemId";

if ($conn->query($sql) === TRUE) {
    echo "Skin eliminada correctamente";
} else {
    echo "Error al eliminar la skin: " . $conn->error;
}

$conn->close();
?>
