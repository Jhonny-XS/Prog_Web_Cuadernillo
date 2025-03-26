<html>
<head>
    <title>Práctica 17 - Resultado del Pedido</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 17 - Resultado del Pedido</h1>
    <?php
    // Verificar si se envió el formulario
    if (isset($_POST['confirmar'])) {
        // Sanitizar los datos recibidos
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'ISO-8859-1');
        $direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'ISO-8859-1');

        // Inicializar el mensaje del pedido
        $pedido = "Pedido de pizzas\n";
        $pedido .= "Nombre: $nombre\n";
        $pedido .= "Dirección: $direccion\n";
        $pedido .= "Detalles del pedido:\n";

        $hay_pedido = false; // Para verificar si se seleccionó al menos una pizza

        // Procesar cada tipo de pizza
        if (isset($_POST['jamon_queso'])) {
            $cantidad_jamon_queso = (int)$_POST['cantidad_jamon_queso'];
            if ($cantidad_jamon_queso > 0) {
                $pedido .= "Jamón y queso: $cantidad_jamon_queso\n";
                $hay_pedido = true;
            }
        }

        if (isset($_POST['napolitana'])) {
            $cantidad_napolitana = (int)$_POST['cantidad_napolitana'];
            if ($cantidad_napolitana > 0) {
                $pedido .= "Napolitana: $cantidad_napolitana\n";
                $hay_pedido = true;
            }
        }

        if (isset($_POST['mozzarella'])) {
            $cantidad_mozzarella = (int)$_POST['cantidad_mozzarella'];
            if ($cantidad_mozzarella > 0) {
                $pedido .= "Mozzarella: $cantidad_mozzarella\n";
                $hay_pedido = true;
            }
        }

        // Verificar si se seleccionó al menos una pizza con cantidad mayor a 0
        if ($hay_pedido) {
            // Guardar el pedido en un archivo de texto
            $archivo = "datos.txt";
            $fecha = date('Y-m-d H:i:s'); // Fecha y hora del pedido
            $pedido .= "Fecha: $fecha\n";
            $pedido .= "------------------------\n";

            // Abrir el archivo en modo append (agregar al final)
            $fp = fopen($archivo, "a");
            if ($fp === false) {
                echo "<p>Error: No se pudo abrir el archivo para guardar el pedido.</p>";
            } else {
                fwrite($fp, $pedido);
                fclose($fp);
                echo "<p>Pedido registrado con éxito para $nombre.</p>";
            }
        } else {
            echo "<p>Error: Debes seleccionar al menos un tipo de pizza con una cantidad mayor a 0.</p>";
        }
    } else {
        echo "<p>Error: Por favor, completa el formulario.</p>";
    }
    ?>
    <p><a href="Practica_17.php">Volver al formulario</a></p>
</body>
</html>