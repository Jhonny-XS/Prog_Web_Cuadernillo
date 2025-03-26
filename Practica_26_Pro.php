<html>
<head>
    <title>Práctica 26 - Resultado Modificación de Curso</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 26 - Resultado Modificación de Curso</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Variable para manejar mensajes
    $mensaje = "";

    // Verificar si se confirmó la modificación
    if (isset($_POST['confirmar'])) {
        $codigo = trim($_POST['codigo']);
        $nuevo_nombre = trim($_POST['nuevo_nombre']);

        if (!empty($codigo) && !empty($nuevo_nombre)) {
            // Escapar los datos para evitar inyecciones SQL
            $codigo = mysqli_real_escape_string($dp, $codigo);
            $nuevo_nombre = mysqli_real_escape_string($dp, $nuevo_nombre);

            // Verificar si el curso existe
            $sql_select = "SELECT * FROM CURSOS WHERE codigo = '$codigo'";
            $resultado = mysqli_query($dp, $sql_select);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                // Actualizar el curso
                $sql_update = "UPDATE CURSOS SET nombrecur = '$nuevo_nombre' WHERE codigo = '$codigo'";
                $actualizado = mysqli_query($dp, $sql_update);

                if ($actualizado) {
                    $mensaje = "El curso con código $codigo ha sido actualizado con éxito. Nuevo nombre: $nuevo_nombre.";
                } else {
                    $error = mysqli_error($dp);
                    $mensaje = "Error al actualizar el curso: $error";
                }
            } else {
                $mensaje = "No se encontró un curso con el código $codigo.";
            }
        } else {
            $mensaje = "Por favor, complete todos los campos.";
        }
    } else {
        $mensaje = "Error: Debes confirmar la acción para modificar el curso.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><?php echo $mensaje; ?></p>
    <p><a href="Practica_26.php">Volver al formulario de modificación</a></p>
</body>
</html>