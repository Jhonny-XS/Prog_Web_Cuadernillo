<html>
<head>
    <title>Práctica 20 - Resultado</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 20 - Resultado</h1>
    <?php
    // Definir la función para verificar si las claves son distintas
    function verificarClaves($clave1, $clave2) {
        if ($clave1 !== $clave2) {
            echo "<p>Error: Las claves ingresadas son distintas.</p>";
            return false;
        }
        return true;
    }

    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['usuario']) && isset($_POST['clave1']) && isset($_POST['clave2'])) {
        // Sanitizar los datos recibidos
        $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'ISO-8859-1');
        $clave1 = $_POST['clave1'];
        $clave2 = $_POST['clave2'];

        // Llamar a la función para verificar las claves
        if (verificarClaves($clave1, $clave2)) {
            echo "<p>Registro exitoso para el usuario $usuario. Las claves coinciden.</p>";
        }
    } else {
        echo "<p>Error: Por favor, completa todos los campos del formulario.</p>";
    }
    ?>
    <p><a href="Practica_20.php">Volver al formulario</a></p>
</body>
</html>