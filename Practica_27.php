<html>
<head>
    <title>Práctica 27 - Alta de Alumno</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 27 - Alta de Alumno</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Consultar los cursos disponibles
    $sql = "SELECT * FROM CURSOS";
    $resultado = mysqli_query($dp, $sql);

    if (!$resultado) {
        echo "<p>Error al consultar los cursos: " . mysqli_error($dp) . "</p>";
        mysqli_close($dp);
        exit();
    }

    // Verificar si hay cursos disponibles
    if (mysqli_num_rows($resultado) == 0) {
        echo "<p>No hay cursos disponibles para seleccionar.</p>";
        mysqli_close($dp);
        exit();
    }
    ?>

    <!-- Formulario para el alta de un alumno -->
    <form action="Practica_27_Pro.php" method="post">
        Ingrese el nombre del alumno:<br>
        <input type="text" name="nombre" required><br><br>

        Ingrese el apellido del alumno:<br>
        <input type="text" name="apellido" required><br><br>

        Ingrese el email del alumno:<br>
        <input type="email" name="mail" required><br><br>

        Ingrese el teléfono del alumno :<br>
        <input type="text" name="telefono" required><br><br>

        Seleccione el curso:<br>
        <?php
        // Mostrar los cursos como opciones de tipo radio
        while ($curso = mysqli_fetch_assoc($resultado)) {
            echo '<input type="radio" name="id_curso" value="' . $curso['codigo'] . '" required>';
            echo $curso['nombrecur'] . '<br>';
        }
        ?>
        <br>

        Ingrese la fecha de inscripción (formato AAAA-MM-DD):<br>
        <input type="date" name="fecha_inscripcion" required><br><br>

        <input type="submit" name="confirmar" value="Confirmar Alta">
    </form>

    <p><a href="practicas.html">Volver al listado de prácticas</a></p>

    <?php
    // Cerrar la conexión
    mysqli_close($dp);
    ?>
</body>
</html>