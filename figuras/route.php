<html>
<head></head>
<body>
<?php
require_once 'lib/Figuras.php';

// Instancia la clase Figuras para acceder a las figuras
$figuras = new Figuras();

// Verifica si se pasó un ID de figura en la URL
if (isset($_GET['id'])) {
    // Obtiene la figura según el ID pasado como parámetro
    $figura = $figuras->get($_GET['id']);
    
    if ($figura) {
        // Imprime el detalle de la figura
        echo "<h1>Detalles de la Figura</h1>";
        echo "<ul>
                <li><strong>ID: </strong>" . $figura->getId() . "</li>
                <li><strong>Tipo: </strong>" . $figura->getName() . "</li>
                <li><strong>Perímetro: </strong>" . $figura->getPerimetro() . "</li>
                <li><strong>Área: </strong>" . $figura->getArea() . "</li>
            </ul>";
    } else {
        echo "<p>Figura no encontrada.</p>";
    }
    
    echo "<a href='./'>Volver</a>";

} elseif (isset($_GET['area'])) {
    // Filtra las figuras por área
    $area = $_GET['area'];
    echo "<h1>Figuras con área menor a $area</h1><ul>";
    
    foreach ($figuras->getBy(new AreaFilter($area)) as $figura) {
        echo "<li>" .
                $figura->ToString() .
                " | <a href='verFigura.php?id=" . $figura->getId() . "'>VER</a>" .
            "</li>";
    }
    
    echo "</ul><a href='./'>Volver</a>";

} else {
    // Listado de todas las figuras
    echo "<h1>Listado de Figuras</h1><ul>";
    
    foreach ($figuras->getAll() as $figura) {
        echo "<li>" .
                $figura->ToString() .
                " | <a href='verFigura.php?id=" . $figura->getId() . "'>VER</a>" .
            "</li>";
    }
    
    echo "</ul><a href='./'>Volver</a>";
}
?>
</body>
</html>
