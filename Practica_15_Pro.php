<html>
<head>
    <title>Práctica 15 - Resultado</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 15 - Resultado</h1>
    <?php
    // Verificar si se enviaron todos los datos del formulario
    if (isset($_POST['ciudad']) && isset($_POST['empresa']) && isset($_POST['representante']) &&
        isset($_POST['domicilio_empresa']) && isset($_POST['empleado']) && isset($_POST['domicilio_empleado'])) {
        
        // Sanitizar los datos recibidos
        $ciudad = htmlspecialchars($_POST['ciudad'], ENT_QUOTES, 'ISO-8859-1');
        $empresa = htmlspecialchars($_POST['empresa'], ENT_QUOTES, 'ISO-8859-1');
        $representante = htmlspecialchars($_POST['representante'], ENT_QUOTES, 'ISO-8859-1');
        $domicilio_empresa = htmlspecialchars($_POST['domicilio_empresa'], ENT_QUOTES, 'ISO-8859-1');
        $empleado = htmlspecialchars($_POST['empleado'], ENT_QUOTES, 'ISO-8859-1');
        $domicilio_empleado = htmlspecialchars($_POST['domicilio_empleado'], ENT_QUOTES, 'ISO-8859-1');

        // Plantilla del contrato con puntos suspensivos
        $contrato = "En la ciudad de [……..], se acuerda entre la Empresa [……..] representada por el Sr. [……..] en su carácter de Apoderado, con domicilio en la calle [……..] y el Sr. [……..], futuro empleado con domicilio en [……..], celebrar el presente contrato a Plazo Fijo, de acuerdo a la normativa vigente de los artículos 90, 92, 93, 94, 95 y concordantes de la Ley de Contrato de Trabajo No. 20744.";

        // Reemplazar los puntos suspensivos con los datos ingresados
        $contrato_modificado = str_replace(
            ["[……..]", "[……..]", "[……..]", "[……..]", "[……..]", "[……..]"],
            [$ciudad, $empresa, $representante, $domicilio_empresa, $empleado, $domicilio_empleado],
            $contrato
        );

        // Mostrar el contrato modificado
        echo "<p>Contrato modificado:</p>";
        echo "<p>$contrato_modificado</p>";
    } else {
        echo "<p>Error: Por favor, completa todos los campos del formulario.</p>";
    }
    ?>
    <p><a href="Practica_15.php">Volver al formulario</a></p>
</body>
</html>