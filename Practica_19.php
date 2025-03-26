<html>
<head>
    <title>Práctica 19 - Vectores (Asociativos)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 19 - Vectores (Asociativos)</h1>
    <?php
    // Definir el vector asociativo con las claves de acceso de 5 usuarios
    $claves_usuarios = array(
        "juan" => "contraseña123",
        "ana" => "secreto456",
        "pedro" => "clave789",
        "maria" => "password101",
        "luis" => "segura202"
    );

    // Acceder a cada componente por su nombre e imprimirlo
    echo "<p>Clave de juan: " . $claves_usuarios["juan"] . "</p>";
    echo "<p>Clave de ana: " . $claves_usuarios["ana"] . "</p>";
    echo "<p>Clave de pedro: " . $claves_usuarios["pedro"] . "</p>";
    echo "<p>Clave de maria: " . $claves_usuarios["maria"] . "</p>";
    echo "<p>Clave de luis: " . $claves_usuarios["luis"] . "</p>";
    ?>
</body>
</html>