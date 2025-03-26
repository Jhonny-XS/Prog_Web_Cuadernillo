<html>
<head>
    <title>Número Aleatorio</title>
</head>
<body>
    <h1>Generación de un Número Aleatorio</h1>
    <p>
    <?php
        // Generar un número aleatorio entre 1 y 100
        $num = rand(1, 100);
        
        // Mostrar el número generado
        echo "El número generado es: $num";
        echo "<br>";
        
        // Evaluar si es menor o igual a 50 o mayor
        if ($num <= 50) {
            echo "El número $num es menor o igual a 50";
        } else {
            echo "El número $num es mayor a 50";
        }
    ?>
    </p>
</body>
</html>