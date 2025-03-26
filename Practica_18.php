<html>
<head>
    <title>Práctica 18 - Lectura de Pedidos</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 18 - Lectura de Pedidos</h1>
    <?php
    // Nombre del archivo de texto (obligatoriamente "datos.txt")
    $archivo = "datos.txt";

    // Verificar si el archivo existe
    if (file_exists($archivo)) {
        // Leer el contenido del archivo
        $contenido = file_get_contents($archivo);

        // Verificar si el archivo está vacío
        if ($contenido === false || trim($contenido) === "") {
            echo "<p>El archivo de pedidos está vacío.</p>";
        } else {
            // Mostrar el contenido del archivo
            echo "<p>Contenido del archivo de pedidos:</p>";
            // Usar <pre> para mantener el formato del texto (saltos de línea y espacios)
            echo "<pre>$contenido</pre>";
        }
    } else {
        echo "<p>Error: El archivo datos.txt no existe.</p>";
    }
    ?>
    <p><a href="Practica_17.php">Volver al formulario de pedidos</a></p>
</body>
</html>