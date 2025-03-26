<html>
<head>
    <title>Ver Datos - Tablas Direcciones y Categorias</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Ver Datos - Tablas Direcciones y Categorias</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // --- Mostrar datos de la tabla `direcciones` ---
    echo "<h3>Tabla Direcciones</h3>";

    // Consulta SQL para la tabla `direcciones`
    $sql_direcciones = "SELECT * FROM direcciones2";
    $resultado_direcciones = mysqli_query($dp, $sql_direcciones);

    if (!$resultado_direcciones) {
        echo "<p>Error al consultar la tabla 'direcciones': " . mysqli_error($dp) . "</p>";
    } else {
        $filas_direcciones = mysqli_num_rows($resultado_direcciones);
        echo "<p>Cantidad de filas: $filas_direcciones</p>\n";

        if ($filas_direcciones == 0) {
            echo "<p>No hay registros en la tabla 'direcciones'.</p>";
        } else {
            // Obtener los nombres de los campos
            $campos_direcciones = mysqli_fetch_fields($resultado_direcciones);

            // Crear la tabla HTML para `direcciones`
            echo "<table border='1' cellspacing='0'>\n";
            echo "<tr>";
            foreach ($campos_direcciones as $campo) {
                $nombrecampo = htmlspecialchars($campo->name);
                echo "<th>$nombrecampo</th>";
            }
            echo "</tr>\n";

            // Mostrar los datos de la tabla `direcciones`
            while ($row = mysqli_fetch_assoc($resultado_direcciones)) {
                echo "<tr>";
                foreach ($row as $value) {
                    $value = htmlspecialchars($value ?? ''); // Escapar datos para evitar XSS
                    echo "<td>$value</td>";
                }
                echo "</tr>\n";
            }
            echo "</table>\n";

            // Liberar el resultado
            mysqli_free_result($resultado_direcciones);
        }
    }    
    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>
</body>
</html>