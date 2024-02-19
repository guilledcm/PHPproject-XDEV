<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortnite Skins Map</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="map">
        <!-- Aquí irán las skins, posicionadas dinámicamente con PHP y CSS -->
        <?php
        // Imagina que ya has consultado tu base de datos y tienes un array $skins
        foreach ($skins as $skin) {
            echo "<div class='skin' style='top: {$skin['posY']}px; left: {$skin['posX']}px;' onclick='showDetails({$skin['id']})'>
                    <img src='{$skin['icon']}' alt='{$skin['nombre']}' />
                  </div>";
        }
        ?>
    </div>

    <div id="skin-details" style="display: none;">
        <!-- Los detalles de la skin se cargarán aquí -->
    </div>

    <script src="script.js"></script>
</body>
</html>