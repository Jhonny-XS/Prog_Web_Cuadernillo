<html>
<head>
    <title>Tabla de Multiplicar del 2</title>
</head>
<body>
    <h1>Tabla de Multiplicar del 2</h1>

    <!-- Usando FOR -->
    <h2>Con FOR</h2>
    <?php
    for ($f = 2; $f <= 20; $f = $f + 2) {
        echo "2 x " . ($f / 2) . " = " . $f . "<br>";
    }
    ?>

    <!-- Usando WHILE -->
    <h2>Con WHILE</h2>
    <?php
    $f = 2;
    while ($f <= 20) {
        echo "2 x " . ($f / 2) . " = " . $f . "<br>";
        $f = $f + 2;
    }
    ?>

    <!-- Usando DO/WHILE -->
    <h2>Con DO/WHILE</h2>
    <?php
    $f = 2;
    do {
        echo "2 x " . ($f / 2) . " = " . $f . "<br>";
        $f = $f + 2;
    } while ($f <= 20);
    ?>
</body>
</html>