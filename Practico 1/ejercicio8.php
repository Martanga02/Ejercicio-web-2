<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos Avanzado</title>
</head>
<body>
    <h1>Formulario de Datos Avanzado</h1>

    <!-- Formulario usando POST -->
    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <!-- Género -->
        <fieldset>
            <legend>Género:</legend>
            <input type="radio" id="masculino" name="genero" value="Masculino" required>
            <label for="masculino">Masculino</label><br>
            <input type="radio" id="femenino" name="genero" value="Femenino" required>
            <label for="femenino">Femenino</label><br>
            <input type="radio" id="otro" name="genero" value="Otro" required>
            <label for="otro">Otro</label>
        </fieldset><br>

        <!-- País -->
        <label for="pais">País:</label>
        <select id="pais" name="pais" required>
            <option value="">Selecciona un país</option>
            <option value="Argentina">Argentina</option>
            <option value="Chile">Chile</option>
            <option value="Colombia">Colombia</option>
            <option value="México">México</option>
            <option value="España">España</option>
        </select><br><br>

        <!-- Intereses -->
        <fieldset>
            <legend>Intereses:</legend>
            <input type="checkbox" id="deportes" name="intereses[]" value="Deportes">
            <label for="deportes">Deportes</label><br>
            <input type="checkbox" id="musica" name="intereses[]" value="Música">
            <label for="musica">Música</label><br>
            <input type="checkbox" id="lectura" name="intereses[]" value="Lectura">
            <label for="lectura">Lectura</label><br>
            <input type="checkbox" id="tecnologia" name="intereses[]" value="Tecnología">
            <label for="tecnologia">Tecnología</label>
        </fieldset><br>

        <input type="submit" value="Enviar con POST">
    </form>

    <hr>

    <!-- Formulario usando GET -->
    <form action="procesar.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <!-- Género -->
        <fieldset>
            <legend>Género:</legend>
            <input type="radio" id="masculino" name="genero" value="Masculino" required>
            <label for="masculino">Masculino</label><br>
            <input type="radio" id="femenino" name="genero" value="Femenino" required>
            <label for="femenino">Femenino</label><br>
            <input type="radio" id="otro" name="genero" value="Otro" required>
            <label for="otro">Otro</label>
        </fieldset><br>

        <!-- País -->
        <label for="pais">País:</label>
        <select id="pais" name="pais" required>
            <option value="">Selecciona un país</option>
            <option value="Argentina">Argentina</option>
            <option value="Chile">Chile</option>
            <option value="Colombia">Colombia</option>
            <option value="México">México</option>
            <option value="España">España</option>
        </select><br><br>

        <!-- Intereses -->
        <fieldset>
            <legend>Intereses:</legend>
            <input type="checkbox" id="deportes" name="intereses[]" value="Deportes">
            <label for="deportes">Deportes</label><br>
            <input type="checkbox" id="musica" name="intereses[]" value="Música">
            <label for="musica">Música</label><br>
            <input type="checkbox" id="lectura" name="intereses[]" value="Lectura">
            <label for="lectura">Lectura</label><br>
            <input type="checkbox" id="tecnologia" name="intereses[]" value="Tecnología">
            <label for="tecnologia">Tecnología</label>
        </fieldset><br>

        <input type="submit" value="Enviar con GET">
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Recibidos</title>
</head>
<body>
    <h1>Datos Recibidos</h1>

    <?php
    // Verificar el método de solicitud
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
        $edad = isset($_POST['edad']) ? trim($_POST['edad']) : '';
        $genero = isset($_POST['genero']) ? trim($_POST['genero']) : '';
        $pais = isset($_POST['pais']) ? trim($_POST['pais']) : '';
        $intereses = isset($_POST['intereses']) ? $_POST['intereses'] : [];
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $nombre = isset($_GET['nombre']) ? trim($_GET['nombre']) : '';
        $apellido = isset($_GET['apellido']) ? trim($_GET['apellido']) : '';
        $edad = isset($_GET['edad']) ? trim($_GET['edad']) : '';
        $genero = isset($_GET['genero']) ? trim($_GET['genero']) : '';
        $pais = isset($_GET['pais']) ? trim($_GET['pais']) : '';
        $intereses = isset($_GET['intereses']) ? $_GET['intereses'] : [];
    } else {
        $nombre = $apellido = $edad = $genero = $pais = '';
        $intereses = [];
    }

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($apellido) || empty($edad) || empty($genero) || empty($pais)) {
        echo "Todos los campos obligatorios deben ser llenados.";
    } else {
        // Mostrar los datos recibidos
        echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
        echo "Apellido: " . htmlspecialchars($apellido) . "<br>";
        echo "Edad: " . htmlspecialchars($edad) . "<br>";
        echo "Género: " . htmlspecialchars($genero) . "<br>";
        echo "País: " . htmlspecialchars($pais) . "<br>";
        
        echo "Intereses: ";
        if (!empty($intereses)) {
            echo "<ul>";
            foreach ($intereses as $interes) {
                echo "<li>" . htmlspecialchars($interes) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Ninguno seleccionado.";
        }
    }
    ?>
</body>
</html>
