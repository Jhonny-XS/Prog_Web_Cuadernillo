<html>
<head>
    <title>Práctica 12 - Resultado</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 12 - Resultado</h1>
    <?php
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['nombre']) && isset($_POST['estudios'])) {
        // Sanitizar los datos recibidos
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'ISO-8859-1');
        $estudios = $_POST['estudios'];

        // Determinar el mensaje según el nivel de estudios
        switch ($estudios) {
            case 'sin_estudios':
                $mensaje = "no tiene estudios.";
                break;
            case 'primarios':
                $mensaje = "tiene estudios primarios.";
                break;
            case 'secundarios':
                $mensaje = "tiene estudios secundarios.";
                break;
            default:
                $mensaje = "no seleccionó un nivel de estudios válido.";
                break;
        }

        // Mostrar el resultado
        echo "<p>$nombre $mensaje</p>";
    } else {
        echo "<p>Error: Por favor, completa todos los campos del formulario.</p>";
    }
    ?>
    <p><a href="Practica_12.php">Volver al formulario</a></p>
</body>
</html>