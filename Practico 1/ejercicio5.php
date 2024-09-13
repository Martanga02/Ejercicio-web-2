<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
</head>
<body>
    <h1>Formulario de Datos</h1>
    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>
        
        <input type="submit" value="Enviar con POST">
    </form>

    <hr>

    <form action="procesar.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>
        
        <input type="submit" value="Enviar con GET">
    </form>
</body>
</html>
<?php
// Verificar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
    $edad = isset($_POST['edad']) ? trim($_POST['edad']) : '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nombre = isset($_GET['nombre']) ? trim($_GET['nombre']) : '';
    $apellido = isset($_GET['apellido']) ? trim($_GET['apellido']) : '';
    $edad = isset($_GET['edad']) ? trim($_GET['edad']) : '';
} else {
    $nombre = $apellido = $edad = '';
}

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($apellido) || empty($edad)) {
    echo "Todos los campos son obligatorios.";
} else {
    // Mostrar los datos recibidos
    echo "<h1>Datos Recibidos</h1>";
    echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
    echo "Apellido: " . htmlspecialchars($apellido) . "<br>";
    echo "Edad: " . htmlspecialchars($edad) . "<br>";
}
?>
