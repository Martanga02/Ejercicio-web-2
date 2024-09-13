<?php
// Leer el tamaño de la lista desde el parámetro GET, con un valor predeterminado de 3 si no se proporciona
$tamano_lista = isset($_GET['tamano']) ? intval($_GET['tamano']) : 3;

// Arreglo base de frutas
$frutas_base = array("Manzana", "Banana", "Cereza", "Naranja", "Mandarina", "Frutilla", "Piña");

// Limitar el tamaño de la lista al tamaño disponible en el arreglo base
$frutas = array_slice($frutas_base, 0, $tamano_lista);

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
    
    <!-- Enlaces para ajustar el tamaño de la lista -->
    <p>
        <a href="?tamano=3">Mostrar 3 frutas</a> |
        <a href="?tamano=5">Mostrar 5 frutas</a> |
        <a href="?tamano=7">Mostrar 7 frutas</a>
    </p>
    
    <ul>
        <?php
        // Genera la lista HTML a partir del arreglo ajustado
        foreach ($frutas as $fruta) {
            echo "<li>" . htmlspecialchars($fruta) . "</li>";
        }
        ?>
    </ul>
</body>
</html>
