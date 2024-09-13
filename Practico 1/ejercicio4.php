<?php
// Leer el límite de la tabla desde el parámetro GET, con un valor predeterminado de 20 si no se proporciona
$limite = isset($_GET['limite']) ? intval($_GET['limite']) : 20;

// Establece el encabezado para el contenido HTML
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tabla de Multiplicar</h1>

    <!-- Formulario para ingresar el límite de la tabla -->
    <form method="get" action="">
        <label for="limite">Ingrese el límite de la tabla:</label>
        <input type="number" id="limite" name="limite" value="<?php echo htmlspecialchars($limite); ?>" min="1" max="100">
        <input type="submit" value="Generar Tabla">
    </form>
    
    <!-- Generar y mostrar la tabla de multiplicar -->
    <table>
        <thead>
            <tr>
                <th>*</th>
                <?php for ($i = 1; $i <= $limite; $i++): ?>
                    <th><?php echo htmlspecialchars($i); ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= $limite; $i++): ?>
                <tr>
                    <th><?php echo htmlspecialchars($i); ?></th>
                    <?php for ($j = 1; $j <= $limite; $j++): ?>
                        <td><?php echo htmlspecialchars($i * $j); ?></td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>
</html>
