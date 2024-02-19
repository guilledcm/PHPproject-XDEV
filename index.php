<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortnite Skins</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Fortnite Skins</h1>

    <button onclick="showAddSkinForm()">Añadir Skin</button>

    <div class="container" id="skinContainer">
        <?php
        include 'db.php';

        $sql = "SELECT * FROM items";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='skin' onclick='showDetails(" . $row["item_id"] . ", \"" . $row["name"] . "\", \"" . $row["description"] . "\", " . $row["price"] . ")'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "' />";
                echo "<p>" . $row["name"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </div>

    <div id="addSkinPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeAddSkinPopup()">&times;</span>
            <h2>Añadir Nueva Skin</h2>
            <form id="newSkinForm" onsubmit="addSkin(event)">
                <label for="name">Nombre:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="price">Precio:</label><br>
                <input type="number" id="price" name="price" required><br>
                <label for="category">Categoría:</label><br>
                <input type="text" id="category" name="category" required><br>
                <label for="image_url">URL de la imagen:</label><br>
                <input type="text" id="image_url" name="image_url" value="images/default.jpg"><br>
                <input type="submit" value="Añadir Skin">
            </form>
        </div>
    </div>

    <div id="detailsPopup" class="detailsPopup">
        <div class="detailsContent">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2 id="popupName"></h2>
            <p id="popupDescription"></p>
            <p id="popupPrice"></p>
            <button onclick="deleteItem()">Eliminar</button>
            <button onclick="modifyItem()">Modificar</button>
            <div id="modifyForm" style="display:none;">
                <label for="newName">Nuevo nombre:</label>
                <input type="text" id="newName">
                <button onclick="updateName()">Guardar</button>
            </div>
        </div>
    </div>

    <script>
        var currentItem;

        function showDetails(itemId, name, description, price) {
            document.getElementById("popupName").innerHTML = name;
            document.getElementById("popupDescription").innerHTML = description;
            document.getElementById("popupPrice").innerHTML = "Precio: $" + price;
            document.getElementById("detailsPopup").style.display = "block";
            currentItem = itemId;
        }

        function closePopup() {
            document.getElementById("detailsPopup").style.display = "none";
        }

        function closeAddSkinPopup() {
            document.getElementById("addSkinPopup").style.display = "none";
        }

        function deleteItem() {
            var itemId = event.target.dataset.itemId;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("Skin eliminada correctamente");
                    closePopup();
                    location.reload();
                }
            };
            xhttp.open("GET", "delete.php?id=" + itemId, true);
            xhttp.send();
        }

        function modifyItem() {
            document.getElementById("modifyForm").style.display = "block";
            document.getElementById("popupName").style.display = "none";
        }

        function updateName() {
            var newName = document.getElementById("newName").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        alert("Nombre actualizado correctamente");
                        closePopup();   
                        location.reload();
                    } else {
                        alert("Error al actualizar el nombre");
                    }
                }
            };
            xhttp.open("GET", "update.php?id=" + currentItem + "&name=" + encodeURIComponent(newName), true);
            xhttp.send();
        }

        function showAddSkinForm() {
            document.getElementById("addSkinPopup").style.display = "block";
        }

        function addSkin(event) {
    event.preventDefault();

    var name = document.getElementById("name").value;
    var price = document.getElementById("price").value;
    var category = document.getElementById("category").value;
    var image_url = document.getElementById("image_url").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var newSkinId = this.responseText;

            var skinContainer = document.getElementById("skinContainer");
            var newSkin = document.createElement("div");
            newSkin.className = "skin";
            newSkin.innerHTML = "<img src='" + image_url + "' alt='" + name + "' /> <p>" + name + "</p>";
            newSkin.addEventListener("click", function() {
                showDetails(newSkinId, name, "", price);
            });
            skinContainer.appendChild(newSkin);

            document.getElementById("name").value = "";
            document.getElementById("price").value = "";
            document.getElementById("category").value = "";
            document.getElementById("image_url").value = "";

            alert("Nueva skin añadida correctamente");
            closeAddSkinPopup();
        }
    };
    xhttp.open("POST", "add_skin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("name=" + encodeURIComponent(name) + "&price=" + price + "&category=" + encodeURIComponent(category) + "&image_url=" + encodeURIComponent(image_url));
}
    </script>
</body>
</html>
