<html>
<head>
    <title>Práctica 28 - Resultado Búsqueda de Alumno</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 28 - Resultado Búsqueda de Alumno</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Variable para manejar mensajes
    $mensaje = "";

    // Verificar si se envió el formulario de búsqueda
    if (isset($_POST['buscar'])) {
        $id_alumno = trim($_POST['id_alumno']);

        if (!empty($id_alumno)) {
            // Escapar el código para evitar inyecciones SQL
            $id_alumno = mysqli_real_escape_string($dp, $id_alumno);

            // Consulta con INNER JOIN para obtener los datos del alumno y el curso
            $sql = "SELECT a.nombre, a.apellido, a.mail, c.nombrecur 
                    FROM alumnos a 
                    INNER JOIN CURSOS c ON a.id_curso = c.codigo 
                    WHERE a.id_alumno = '$id_alumno'";
            $resultado = mysqli_query($dp, $sql);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $alumno = mysqli_fetch_assoc($resultado);
                // Mostrar los datos del alumno
                echo "<p><b>Nombre:</b> " . $alumno['nombre'] . " " . $alumno['apellido'] . "</p>";
                echo "<p><b>Email:</b> " . ($alumno['mail'] ? $alumno['mail'] : "No especificado") . "</p>";
                echo "<p><b>Curso:</b> " . $alumno['nombrecur'] . "</p>";
            } else {
                $mensaje = "No se encontró un alumno con el código $id_alumno.";
            }
        } else {
            $mensaje = "Por favor, ingrese un código de alumno válido.";
        }
    } else {
        $mensaje = "Error: Debes enviar el formulario para buscar un alumno.";
    }

    // Mostrar mensaje de error si existe
    if (!empty($mensaje)) {
        echo "<p>$mensaje</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <p><a href="Practica_28.php">Volver al formulario de búsqueda</a></p>
    <p><a href="practicas.html">Volver al listado de prácticas</a></p>
</body>
</html>