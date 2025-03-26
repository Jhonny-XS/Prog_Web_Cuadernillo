<html>
<head>
    <title>MySQL 02 - Consulta BD con tabla (Agenda)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>MySQL 02 - Consulta BD con tabla (Agenda)</h1>
    <?php
    // Conectar a la base de datos
    $dp = mysqli_connect("mysql.webcindario.com", "cuadernillo", "1234");
    if (!$dp) {
        die("<p>Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() . "</p>");
    }

    // Seleccionar la base de datos
    if (!mysqli_select_db($dp, "agenda")) {
        die("<p>Error: No se pudo seleccionar la base de datos 'agenda': " . mysqli_error($dp) . "</p>");
    }

    // Consulta SQL
    $sql = "SELECT * FROM direcciones";
    $resultado = mysqli_query($dp, $sql);
    if (!$resultado) {
        die("<p>Error en la consulta: " . mysqli_error($dp) . "</p>");
    }

    // Obtener el número de filas y campos
    $filas = mysqli_num_rows($resultado);
    echo "<p>Cantidad de filas: $filas</p>\n";

    // Si no hay filas, mostrar un mensaje y detener la ejecución
    if ($filas == 0) {
        echo "<p>No hay registros en la tabla 'direcciones'.</p>";
    } else {
        // Obtener los nombres de los campos
        $campos = mysqli_fetch_fields($resultado);

        // Crear la tabla HTML
        echo "<table border='1' cellspacing='0'>\n";
        echo "<tr>";
        foreach ($campos as $campo) {
            $nombrecampo = htmlspecialchars($campo->name);
            echo "<th>$nombrecampo</th>";
        }
        echo "</tr>\n";

        // Mostrar los datos de la tabla
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            foreach ($row as $value) {
                $value = htmlspecialchars($value); // Escapar datos para evitar XSS
                echo "<td>$value</td>";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    }

    // Liberar el resultado y cerrar la conexión
    mysqli_free_result($resultado);
    mysqli_close($dp);
    ?>
</body>
</html>