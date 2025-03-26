<html>
<head>
    <title>Práctica 24 - Resultado Eliminación Curso</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 24 - Resultado Eliminación Curso</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Verificar si se envió el formulario
    if (isset($_POST['nombrecur'])) {
        // Sanitizar el nombre del curso
        $nombrecur = trim($_POST['nombrecur']);
        if (empty($nombrecur)) {
            echo "<p>Error: El nombre del curso no puede estar vacío.</p>";
        } else {
            // Verificar si el curso existe
            $sql_select = "SELECT * FROM cursos WHERE nombrecur = ?";
            $stmt_select = mysqli_prepare($dp, $sql_select);
            if ($stmt_select) {
                mysqli_stmt_bind_param($stmt_select, "s", $nombrecur);
                mysqli_stmt_execute($stmt_select);
                $resultado = mysqli_stmt_get_result($stmt_select);
                $filas = mysqli_num_rows($resultado);

                if ($filas == 0) {
                    echo "<p>No existe un curso con el nombre '<b>" . htmlspecialchars($nombrecur) . "</b>'.</p>";
                } else {
                    // Intentar eliminar el curso
                    $sql_delete = "DELETE FROM cursos WHERE nombrecur = ?";
                    $stmt_delete = mysqli_prepare($dp, $sql_delete);
                    if ($stmt_delete) {
                        mysqli_stmt_bind_param($stmt_delete, "s", $nombrecur);
                        $eliminado = mysqli_stmt_execute($stmt_delete);

                        if ($eliminado) {
                            echo "<p>Curso '<b>" . htmlspecialchars($nombrecur) . "</b>' eliminado con éxito.</p>";
                            echo "<p>Se eliminaron $filas registro(s).</p>";
                        } else {
                            $error = mysqli_error($dp);
                            if (strpos($error, "foreign key constraint fails") !== false) {
                                echo "<p>Error: No se puede eliminar el curso '<b>" . htmlspecialchars($nombrecur) . "</b>' porque hay alumnos inscritos en él.</p>";
                            } else {
                                echo "<p>Error al eliminar el curso: " . $error . "</p>";
                            }
                        }

                        // Cerrar la declaración de eliminación
                        mysqli_stmt_close($stmt_delete);
                    } else {
                        echo "<p>Error al preparar la consulta de eliminación: " . mysqli_error($dp) . "</p>";
                    }
                }

                // Cerrar la declaración de selección
                mysqli_stmt_close($stmt_select);
            } else {
                echo "<p>Error al preparar la consulta de búsqueda: " . mysqli_error($dp) . "</p>";
            }
        }
    } else {
        echo "<p>Error: Por favor, ingresa el nombre del curso a eliminar.</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><a href="Practica_24.php">Volver al formulario</a></p>
</body>
</html>