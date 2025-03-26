<html>
<head>
    <title>Resultados de la Encuesta</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Resultados de la Encuesta</h1>
    <h3>¿Qué opinas de este curso de PHP?</h3>
    <?php
    $file = "results.txt";
    if (file_exists($file) && filesize($file) > 0) {
        $votes = explode(",", file_get_contents($file));
        // Asegurarse de que el array tenga los 3 índices necesarios
        $votes = array_pad($votes, 3, 0);
        echo "<p>Excelente, he aprendido mucho: " . ($votes[0] ?? 0) . " votos</p>";
        echo "<p>Más o menos, es muy complicado: " . ($votes[1] ?? 0) . " votos</p>";
        echo "<p>¡Bah! ¿para qué quiero aprender PHP?: " . ($votes[2] ?? 0) . " votos</p>";
    } else {
        echo "<p>No hay votos aún.</p>";
    }
    ?>
    <p><a href="31_encuesta.php">Volver a la encuesta</a></p>
</body>
</html>