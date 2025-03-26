<html>

<head>
    <title>El gran agujero de seguridad</title>
</head>

<body>
    <h2>Agujero de seguridad en register_globals = On</h2>
    <form action="<?php echo "33_seguridad.php"; ?>" method="post">
        Contraseña: <input type="password" name="pass">
        <input type="submit" value="Enviar">
    </form>
    <?php
    $login = false;
    if (isset($_POST['pass'])) {
        // Obtener el valor de la contraseña enviada
        $pass = $_POST['pass'];

        // Comparar la contraseña
        if ($pass == "abc_xyz_123") {
            $login = true;
        }
    }
    if ($login) {
        echo "<p>Aqui empieza el arma secreta.</p>";
    } else if (isset($_POST['pass'])) {
        echo "<p>Error: Contraseña incorrecta.</p>";
    }
    ?>
</body>

</html>