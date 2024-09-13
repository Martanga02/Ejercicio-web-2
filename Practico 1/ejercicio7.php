<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora y Más</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        nav {
            margin-bottom: 20px;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
        }
        input[type="text"], input[type="number"], input[type="submit"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="?section=calculator">Calculadora</a>
            <a href="?section=pi">Número Pi</a>
            <a href="?section=about">About</a>
        </nav>

        <?php
        // Determinar la sección actual
        $section = isset($_GET['section']) ? $_GET['section'] : 'calculator';

        if ($section === 'calculator') {
            echo '<h2>Calculadora Básica</h2>';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = isset($_POST["num1"]) ? floatval($_POST["num1"]) : 0;
                $num2 = isset($_POST["num2"]) ? floatval($_POST["num2"]) : 0;
                $operacion = isset($_POST["operacion"]) ? $_POST["operacion"] : '';

                switch ($operacion) {
                    case "suma":
                        $resultado = $num1 + $num2;
                        break;
                    case "resta":
                        $resultado = $num1 - $num2;
                        break;
                    case "multiplicacion":
                        $resultado = $num1 * $num2;
                        break;
                    case "division":
                        if ($num2 != 0) {
                            $resultado = $num1 / $num2;
                        } else {
                            $resultado = "Error: División por cero.";
                        }
                        break;
                    default:
                        $resultado = "Operación no válida.";
                }
            } else {
                $resultado = '';
            }
            ?>
            <form action="?section=calculator" method="POST">
                <label for="num1">Número 1:</label>
                <input type="number" id="num1" name="num1" step="0.01" required>
                <label for="num2">Número 2:</label>
                <input type="number" id="num2" name="num2" step="0.01" required>
                <label for="operacion">Operación:</label>
                <select id="operacion" name="operacion" required>
                    <option value="suma">Suma</option>
                    <option value="resta">Resta</option>
                    <option value="multiplicacion">Multiplicación</option>
                    <option value="division">División</option>
                </select>
                <input type="submit" value="Calcular">
            </form>
            <?php
            if ($resultado !== '') {
                echo "<h3>Resultado: " . htmlspecialchars($resultado) . "</h3>";
            }
        } elseif ($section === 'pi') {
            ?>
            <h2>Número Pi</h2>
            <p>El número π (pi) es una constante matemática que representa la relación entre la circunferencia de un círculo y su diámetro. Es un número irracional, lo que significa que no puede expresarse como una fracción exacta y sus dígitos decimales continúan infinitamente sin repetirse.</p>
            <p>Valor aproximado de π: <?php echo number_format(pi(), 10); ?></p>
            <?php
        } elseif ($section === 'about') {
            $developer = isset($_GET['developer']) ? htmlspecialchars($_GET['developer']) : '';
            ?>
            <h2>About</h2>
            <?php
            if ($developer) {
                echo "<p>Información sobre el desarrollador: $developer.</p>";
            } else {
                echo "<p>Esta calculadora fue desarrollada por el equipo de desarrollo de la calculadora básica.</p>";
                echo "<p>Los desarrolladores incluyen a: Juan, Ana, y Pedro.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
