<html>
<head>
    <title>Práctica 16 - Vectores (Tradicionales)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 16 - Vectores (Tradicionales)</h1>
    <?php
    // Definir el vector con los nombres de los días de la semana
    $dias_semana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

    // Obtener el primer elemento (índice 0)
    $primer_dia = $dias_semana[0];

    // Obtener el último elemento (índice count($dias_semana) - 1)
    $ultimo_dia = $dias_semana[count($dias_semana) - 1];

    // Imprimir los resultados
    echo "<p>El primer día de la semana es: $primer_dia</p>";
    echo "<p>El último día de la semana es: $ultimo_dia</p>";
    ?>
</body>
</html>