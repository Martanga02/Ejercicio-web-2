<!DOCTYPE html>
<html lang="es">
<head>
<base href="<?php echo BASE_URL ?>">
    <meta charset="UTF-8">
    <title>Tablas de Multiplicar</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .menu {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Simulación de Inversión</h1>

    <div class="menu">
        <h2>Seleccione una Tabla de Multiplicar</h2>
        <a href="?tabla=5">Tabla del 5</a> |
        <a href="?tabla=10">Tabla del 10</a> |
        <a href="?tabla=20">Tabla del 20</a>
    </div>

    <?php

    // Manejo de la tabla de multiplicar
    if (!empty($_GET['tabla'])) {
        $Tabla = $_GET["tabla"];
        if ($Tabla > 0) {
            echo "<h2>Tabla del $tabla</h2>";
            echo "<table>";
            echo "<tr><th>Multiplicador</th><th>Resultado</th></tr>";

            for ($i = 1; $i <= 10; $i++) {
                echo "<tr><td>$tabla x $i</td><td>" . ($Tabla * $i) . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='color:red;'>Por favor, seleccione un número de tabla válido.</p>";
        }
    }

    //como se conecta con el archivo htaccess?
    ?>
    
</body>
</html>
