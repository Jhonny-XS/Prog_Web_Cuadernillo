<html>
<head>
    <title>Práctica 26 - Modificar Curso</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 26 - Modificar Curso</h1>

    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Variable para manejar mensajes y datos del curso
    $mensaje = "";
    $curso = null;

    // Si se envió el formulario de búsqueda
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buscar'])) {
        $codigo = trim($_POST['codigo']);
        
        if (!empty($codigo)) {
            // Escapar el código para evitar inyecciones SQL
            $codigo = mysqli_real_escape_string($dp, $codigo);
            
            // Buscar el curso
            $sql = "SELECT * FROM CURSOS WHERE codigo = '$codigo'";
            $resultado = mysqli_query($dp, $sql);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $curso = mysqli_fetch_assoc($resultado);
            } else {
                $mensaje = "No se encontró un curso con el código $codigo.";
            }
        } else {
            $mensaje = "Por favor, ingrese un código válido.";
        }
    }

    // Cerrar la conexión
    mysqli_close($dp);
    ?>

    <!-- Mostrar mensaje si existe -->
    <?php if (!empty($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <!-- Formulario para buscar el curso -->
    <form action="Practica_26.php" method="post">
        Ingrese el código del curso:<br>
        <input type="text" name="codigo"><br><br>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <!-- Mostrar formulario de confirmación si se encontró el curso -->
    <?php if ($curso): ?>
        <p><b>Código:</b> <?php echo $curso['codigo']; ?></p>
        <p><b>Nombre Actual:</b> <?php echo $curso['nombrecur']; ?></p>
        <form action="Practica_26_Pro.php" method="post">
            <input type="hidden" name="codigo" value="<?php echo $curso['codigo']; ?>">
            Ingrese el nuevo nombre del curso:<br>
            <input type="text" name="nuevo_nombre"><br><br>
            <input type="submit" name="confirmar" value="Confirmar Modificación">
        </form>
        <p><a href="Practica_26.php">Cancelar y volver a buscar</a></p>
    <?php endif; ?>
</body>
</html>