<html>
<head>
    <title>Práctica 11 - Resultado</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    </head>
<body>
    <h1>Práctica 11 - Resultado</h1>
    <div class="result-container">
        <?php
        // Verificar si se enviaron los datos del formulario
        if (isset($_POST['nombre']) && isset($_POST['edad'])) {
            // Sanitizar los datos recibidos
            $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'ISO-8859-1');
            $edad = (int)$_POST['edad'];

            // Verificar si la edad es un número válido
            if ($edad < 0 || $edad > 150) {
                echo "<p class='error'>Error: La edad debe estar entre 0 y 150.</p>";
            } else {
                // Determinar si es mayor de edad
                if ($edad >= 18) {
                    echo "<p>$nombre, eres mayor de edad.</p>";
                } else {
                    echo "<p>$nombre, no eres mayor de edad.</p>";
                }
            }
        } else {
            echo "<p class='error'>Error: Por favor, completa todos los campos del formulario.</p>";
        }
        ?>
        <a href="Practica_11.php">Volver al formulario</a>
    </div>
</body>
</html>