<html>
<head>
    <title>Práctica 27 - Resultado Alta de Alumno</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 27 - Resultado Alta de Alumno</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Variable para manejar mensajes
    $mensaje = "";

    // Verificar si se confirmó la alta
    if (isset($_POST['confirmar'])) {
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $mail = trim($_POST['mail']);
        $telefono = trim($_POST['telefono']);
        $id_curso = trim($_POST['id_curso']);
        $fecha_inscripcion = trim($_POST['fecha_inscripcion']);

        // Validar los campos obligatorios
        if (!empty($nombre) && !empty($apellido) && !empty($id_curso) && !empty($fecha_inscripcion)) {
            // Escapar los datos para evitar inyecciones SQL
            $nombre = mysqli_real_escape_string($dp, $nombre);
            $apellido = mysqli_real_escape_string($dp, $apellido);
            $mail = !empty($mail) ? "'" . mysqli_real_escape_string($dp, $mail) . "'" : "NULL";
            $telefono = !empty($telefono) ? "'" . mysqli_real_escape_string($dp, $telefono) . "'" : "NULL";
            $id_curso = mysqli_real_escape_string($dp, $id_curso);
            $fecha_inscripcion = mysqli_real_escape_string($dp, $fecha_inscripcion);

            // Obtener el próximo id_alumno (autoincremental)
            $sql_max_id = "SELECT MAX(id_alumno) as max_id FROM alumnos";
            $resultado = mysqli_query($dp, $sql_max_id);
            $fila = mysqli_fetch_assoc($resultado);
            $id_alumno = $fila['max_id'] + 1;

            // Insertar el nuevo alumno
            $sql_insert = "INSERT INTO alumnos (id_alumno, nombre, apellido, mail, telefono, id_curso, fecha_inscripcion) 
                           VALUES ($id_alumno, '$nombre', '$apellido', $mail, $telefono, '$id_curso', '$fecha_inscripcion')";
            $insertado = mysqli_query($dp, $sql_insert);

            if ($insertado) {
                $mensaje = "El alumno $nombre $apellido ha sido dado de alta con éxito. ID: $id_alumno.";
            } else {
                $error = mysqli_error($dp);
                if (strpos($error, "foreign key constraint fails") !== false) {
                    $mensaje = "Error: El curso seleccionado (ID: $id_curso) no existe.";
                } else {
                    $mensaje = "Error al dar de alta al alumno: $error";
                }
            }
        } else {
            $mensaje = "Por favor, complete todos los campos obligatorios.";
        }
    } else {
        $mensaje = "Error: Debes confirmar la acción para dar de alta al alumno.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><?php echo $mensaje; ?></p>
    <p><a href="Practica_27.php">Volver al formulario de alta</a></p>
    <p><a href="practicas.html">Volver al listado de prácticas</a></p>
</body>
</html>