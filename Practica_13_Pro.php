<html>
<head>
    <title>Práctica 13 - Resultado</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 13 - Resultado</h1>
    <?php
    // Verificar si se envió el nombre
    if (isset($_POST['nombre'])) {
        // Sanitizar el nombre recibido
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'ISO-8859-1');

        // Contar la cantidad de deportes seleccionados
        $deportes = isset($_POST['deportes']) && is_array($_POST['deportes']) ? $_POST['deportes'] : [];
        $cantidad_deportes = count($deportes);

        // Mostrar el resultado
        echo "<p>$nombre practica $cantidad_deportes deporte(s).</p>";
    } else {
        echo "<p>Error: Por favor, completa el campo del nombre.</p>";
    }
    ?>
    <p><a href="Practica_13.php">Volver al formulario</a></p>
</body>
</html>