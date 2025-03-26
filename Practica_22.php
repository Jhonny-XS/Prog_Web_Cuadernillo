<html>
<head>
    <title>Práctica 22 - Listado de Cursos</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 22 - Listado de Cursos</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Consulta SQL para recuperar todos los registros de la tabla `cursos`
    $sql = "SELECT * FROM cursos";
    $resultado = mysqli_query($dp, $sql);

    if (!$resultado) {
        echo "<p>Error al consultar la tabla 'cursos': " . mysqli_error($dp) . "</p>";
    } else {
        $filas = mysqli_num_rows($resultado);
        echo "<p>Cantidad de cursos: $filas</p>\n";

        if ($filas == 0) {
            echo "<p>No hay cursos registrados en la tabla 'cursos'.</p>";
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

            // Mostrar los datos de la tabla `cursos`
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                foreach ($row as $value) {
                    $value = htmlspecialchars($value ?? ''); // Escapar datos para evitar XSS
                    echo "<td>$value</td>";
                }
                echo "</tr>\n";
            }
            echo "</table>\n";

            // Liberar el resultado
            mysqli_free_result($resultado);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><a href="Practica_21.php">Volver al formulario de alta</a></p>
</body>
</html>