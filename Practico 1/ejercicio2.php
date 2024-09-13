<?php
// Arreglo de ejemplo
$frutas = array("Manzana", "Banana", "Cereza", "Naranja");

// Establece el encabezado para el contenido HTML
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Frutas</title>
</head>
<body>
    <h1>Lista de Frutas</h1>
    <ul>
        <?php
        // Genera la lista HTML a partir del arreglo
        foreach ($frutas as $fruta) {
            echo "<li>" . htmlspecialchars($fruta) . "</li>";
        }
        ?>
    </ul>
</body>
</html>
