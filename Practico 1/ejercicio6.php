<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Simulación de Inversión</title>
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
    </style>
</head>
<body>
    <h2>Simulación de Inversión</h2>
    <form action="index.php" method="POST">
        <label for="cantidad_inicial">Cantidad Inicial:</label>
        <input type="number" id="cantidad_inicial" name="cantidad_inicial" step="0.01" required>
        <br><br>
        <label for="porcentaje_interes">Porcentaje de Interés Mensual (%):</label>
        <input type="number" id="porcentaje_interes" name="porcentaje_interes" step="0.01" required>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad_inicial = floatval($_POST["cantidad_inicial"]);
        $porcentaje_interes = floatval($_POST["porcentaje_interes"]);

        if ($cantidad_inicial > 0 && $porcentaje_interes > 0) {
            // Calcula el interés mensual como un decimal
            $tasa_interes_mensual = $porcentaje_interes / 100;

            echo "<h2>Resultados de la Inversión</h2>";
            echo "<table>";
            echo "<tr><th>Mes</th><th>Saldo</th></tr>";

            $saldo = $cantidad_inicial;
            for ($mes = 1; $mes <= 12; $mes++) {
                $saldo += $saldo * $tasa_interes_mensual;
                echo "<tr><td>$mes</td><td>$" . number_format($saldo, 2) . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='color:red;'>Por favor, ingrese valores positivos para la cantidad inicial y el porcentaje de interés.</p>";
        }
    }
    ?>
</body>
</html>
