<html>
<head>
    <title>Número Aleatorio</title>
</head>
<body>
    <h1>Número Aleatorio</h1>
    <p>
    <?php
    $valor = rand(1, 5);
    echo "El número generado es: " . $valor . "<br>";
    if ($valor == 1) {
        echo "uno";
    }
    if ($valor == 2) {
        echo "dos";
    }
    if ($valor == 3) {
        echo "tres";
    }
    if ($valor == 4) {
        echo "cuatro";
    }
    if ($valor == 5) {
        echo "cinco";
    }
    ?>
    </p>
</body>
</html>