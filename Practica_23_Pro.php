<html>
<head>
    <title>Práctica 23 - Resultados de Búsqueda</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 23 - Resultados de Búsqueda</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Verificar si se envió el formulario
    if (isset($_POST['nombre'])) {
        // Sanitizar el nombre ingresado
        $nombre = trim($_POST['nombre']);
        if (empty($nombre)) {
            echo "<p>Error: El nombre no puede estar vacío.</p>";
        } else {
            // Preparar la consulta SQL usando una consulta preparada
            $sql = "SELECT * FROM alumnos WHERE nombre LIKE ?";
            $stmt = mysqli_prepare($dp, $sql);
            if ($stmt) {
                // Usar LIKE con comodines para buscar coincidencias parciales
                $nombre_busqueda = "%" . $nombre . "%";
                mysqli_stmt_bind_param($stmt, "s", $nombre_busqueda);

                // Ejecutar la consulta
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);

                // Obtener el número de filas
                $filas = mysqli_num_rows($resultado);
                echo "<p>Alumnos encontrados con el nombre '<b>" . htmlspecialchars($nombre) . "</b>': $filas</p>\n";

                if ($filas == 0) {
                    echo "<p>No se encontraron alumnos con el nombre '<b>" . htmlspecialchars($nombre) . "</b>'.</p>";
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

                    // Mostrar los datos de los alumnos
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            $value = htmlspecialchars($value ?? ''); // Escapar datos para evitar XSS
                            echo "<td>$value</td>";
                        }
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                }

                // Cerrar la declaración preparada
                mysqli_stmt_close($stmt);
            } else {
                echo "<p>Error al preparar la consulta: " . mysqli_error($dp) . "</p>";
            }
        }
    } else {
        echo "<p>Error: Por favor, ingresa un nombre para buscar.</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><a href="Practica_23.php">Volver a buscar</a></p>
</body>
</html>