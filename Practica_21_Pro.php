<html>
<head>
    <title>Práctica 21 - Resultado Alta de Cursos</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 21 - Resultado Alta de Cursos</h1>
    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Verificar si se envió el formulario
    if (isset($_POST['nombrecur'])) {
        // Sanitizar y validar el nombre del curso
        $nombrecur = trim($_POST['nombrecur']);
        if (empty($nombrecur)) {
            echo "<p>Error: El nombre del curso no puede estar vacío.</p>";
        } elseif (strlen($nombrecur) > 40) {
            echo "<p>Error: El nombre del curso no puede tener más de 40 caracteres.</p>";
        } else {
            // Preparar la consulta SQL usando una consulta preparada
            $sql = "INSERT INTO cursos (nombrecur) VALUES (?)";
            $stmt = mysqli_prepare($dp, $sql);
            if ($stmt) {
                // Vincular el parámetro
                mysqli_stmt_bind_param($stmt, "s", $nombrecur);

                // Ejecutar la consulta
                $resultado = mysqli_stmt_execute($stmt);
                if ($resultado) {
                    echo "<p>Curso '<b>" . htmlspecialchars($nombrecur) . "</b>' agregado con éxito.</p>";
                } else {
                    echo "<p>Error al agregar el curso: " . mysqli_error($dp) . "</p>";
                }

                // Cerrar la declaración preparada
                mysqli_stmt_close($stmt);
            } else {
                echo "<p>Error al preparar la consulta: " . mysqli_error($dp) . "</p>";
            }
        }
    } else {
        echo "<p>Error: Por favor, completa el formulario.</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>
    <p><a href="Practica_21.php">Volver al formulario</a></p>
</body>
</html>