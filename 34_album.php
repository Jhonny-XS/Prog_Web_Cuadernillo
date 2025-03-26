<html>
<head>
    <title>Mi album de fotografias</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Mi album de fotos en linea</h1>
    <h3>Cargar archivo</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" name="submit" value="Cargar archivo">
    </form>

    <?php
    // Definir la ruta de la carpeta donde se guardarán las imágenes
    $ruta = "img/";

    // Verificar si la carpeta existe, y si no, crearla
    if (!is_dir($ruta)) {
        mkdir($ruta, 0777, true);
    }

    // Verificar si se ha enviado un archivo
    if (isset($_POST['submit']) && isset($_FILES['archivo']) && $_FILES['archivo']['size'] > 0) {
        $tamanyomax = 200000; // Tamaño máximo en bytes (200 KB)
        $nombretemp = $_FILES['archivo']['tmp_name'];
        $nombrearchivo = basename($_FILES['archivo']['name']); // Usar basename para evitar problemas de seguridad
        $tamanyoarchivo = $_FILES['archivo']['size'];

        // Verificar si el archivo es una imagen GIF o JPG
        $tipoarchivo = getimagesize($nombretemp);
        if ($tipoarchivo !== false && ($tipoarchivo[2] == IMAGETYPE_GIF || $tipoarchivo[2] == IMAGETYPE_JPEG)) {
            if ($tamanyoarchivo <= $tamanyomax) {
                // Mover el archivo a la carpeta destino
                if (move_uploaded_file($nombretemp, $ruta . $nombrearchivo)) {
                    echo "<p>El archivo se ha cargado <b>con éxito</b>. Tamaño de archivo: <b>$tamanyoarchivo</b> bytes, Nombre de imagen: <b>$nombrearchivo</b></p>";
                } else {
                    echo "<p>No se ha podido cargar el archivo. Verifica los permisos de la carpeta.</p>";
                }
            } else {
                echo "<p>El archivo tiene más de <b>$tamanyomax bytes</b> y es demasiado grande.</p>";
            }
        } else {
            echo "<p>No es un archivo GIF o JPG válido.</p>";
        }

        // Formulario para recargar la página
        echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>";
        echo "<input type='submit' value='OK'>";
        echo "</form>";
    }

    // Mostrar las imágenes de la carpeta
    $filehandle = @opendir($ruta); // Abrir la carpeta
    if ($filehandle) {
        echo "<h3>Imágenes en el álbum</h3>";
        $hay_imagenes = false; // Para verificar si hay imágenes
        while ($file = readdir($filehandle)) {
            if ($file != "." && $file != ".." && is_file($ruta . $file)) {
                $tamanyo = getimagesize($ruta . $file);
                if ($tamanyo !== false) {
                    echo "<p><img src='$ruta$file' " . $tamanyo[3] . "><br></p>";
                    $hay_imagenes = true;
                }
            }
        }
        if (!$hay_imagenes) {
            echo "<p>No hay imágenes en el álbum.</p>";
        }
        closedir($filehandle); // Cerrar la carpeta
    } else {
        echo "<p>Error: No se pudo abrir la carpeta $ruta.</p>";
    }
    ?>
</body>
</html>