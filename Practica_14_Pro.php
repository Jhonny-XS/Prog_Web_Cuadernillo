<html>
<head>
    <title>Práctica 14 - Resultado</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 14 - Resultado</h1>
    <?php
    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['nombre']) && isset($_POST['ingresos'])) {
        // Sanitizar los datos recibidos
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'ISO-8859-1');
        $ingresos = $_POST['ingresos'];

        // Determinar si debe pagar impuestos
        if ($ingresos === "mayor-3000") {
            echo "<p>$nombre, debes pagar impuestos a las ganancias porque tus ingresos superan 3000.</p>";
        } else {
            echo "<p>$nombre, no debes pagar impuestos a las ganancias porque tus ingresos no superan 3000.</p>";
        }
    } else {
        echo "<p>Error: Por favor, completa todos los campos del formulario.</p>";
    }
    ?>
    <p><a href="Practica_14.php">Volver al formulario</a></p>
</body>
</html>