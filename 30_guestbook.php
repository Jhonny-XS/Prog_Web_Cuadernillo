<html>
<head>
    <title>Un libro de visitas muy sencillo</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Libro de visitas</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Tu comentario:<br>
        <textarea cols="55" rows="4" name="comment" required></textarea><br>
        Tu nombre:<br>
        <input type="text" name="name" required><br>
        Tu e-mail:<br>
        <input type="email" name="email" required><br>
        <input type="submit" value="publica">
    </form>
    <h3>Mostrar todos los comentarios</h3>
    <?php
    // Nombre del archivo
    $file = "guestbook.txt";

    // Crear el archivo si no existe
    if (!file_exists($file)) {
        file_put_contents($file, "");
    }

    // Procesar el formulario si se ha enviado
    if (isset($_POST['comment']) && !empty($_POST['name']) && !empty($_POST['email'])) {
        $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'ISO-8859-1');
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'ISO-8859-1');
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // Validar el correo
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Abrir el archivo para lectura y escritura
            $fp = fopen($file, "r+");
            if ($fp === false) {
                die("Error al abrir el archivo $file");
            }

            // Leer el contenido existente
            $old = "";
            $size = filesize($file);
            if ($size > 0) {
                $old = fread($fp, $size);
                if ($old === false) {
                    die("Error al leer el archivo $file");
                }
            }

            // Crear el enlace de correo
            $emailLink = "<a href=\"mailto:$email\">$email</a>";
            // Incluir la fecha
            $dateOfEntry = date("y-n-j");
            // Montar la entrada del libro de visitas
            $entry = "<p><b>$name</b> ($emailLink) wrote on <i>$dateOfEntry</i>:<br>$comment</p>\n";

            // Volver al inicio del archivo
            rewind($fp);
            // Escribir la nueva entrada seguida del contenido antiguo
            fputs($fp, $entry . $old);
            // Cerrar el archivo
            fclose($fp);
        } else {
            echo "<p>Por favor, introduce un correo válido.</p>";
        }
    }

    // Mostrar el contenido del archivo
    if (file_exists($file) && filesize($file) > 0) {
        echo file_get_contents($file);
    } else {
        echo "<p>No hay comentarios aún.</p>";
    }
    ?>
</body>
</html>