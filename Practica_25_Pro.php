<html>
<head>
    <title>Práctica 25 - Resultado Eliminación de Todos los Cursos</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 25 - Resultado Eliminación de Todos los Cursos</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Verificar si se confirmó la eliminación
    if (isset($_POST['confirmar'])) {
        // Verificar si hay registros en la tabla
        $sql_select = "SELECT COUNT(*) as total FROM cursos";
        $resultado = mysqli_query($dp, $sql_select);
        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            $total_registros = $fila['total'];

            if ($total_registros == 0) {
                echo "<p>La tabla 'CURSOS' ya está vacía. No hay registros para eliminar.</p>";
            } else {
                // Intentar eliminar todos los registros
                $sql_delete = "DELETE FROM cursos";
                $eliminado = mysqli_query($dp, $sql_delete);

                if ($eliminado) {
                    echo "<p>Todos los registros de la tabla 'CURSOS' han sido eliminados con éxito.</p>";
                    echo "<p>Se eliminaron $total_registros registro(s).</p>";
                } else {
                    $error = mysqli_error($dp);
                    if (strpos($error, "foreign key constraint fails") !== false) {
                        echo "<p>Error: No se pueden eliminar los cursos porque hay alumnos inscritos en ellos.</p>";
                    } else {
                        echo "<p>Error al eliminar los registros: " . $error . "</p>";
                    }
                }
            }
        } else {
            echo "<p>Error al verificar la tabla 'CURSOS': " . mysqli_error($dp) . "</p>";
        }
    } else {
        echo "<p>Error: Debes confirmar la acción para eliminar los registros.</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><a href="Practica_25.php">Volver al formulario de eliminación</a></p>
    <p><a href="Practica_22.php">Ver el listado de cursos</a></p>
</body>
</html>