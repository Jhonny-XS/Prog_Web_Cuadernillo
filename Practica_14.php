<html>
<head>
    <title>Práctica 14 - Formulario (Control Select)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 14 - Formulario (Control Select)</h1>
    <form action="Practica_14_Pro.php" method="post">
        Nombre: <br>
        <input type="text" name="nombre" required> <br>
        Ingresos anuales: <br>
        <select name="ingresos" required>
            <option value="1-1000">1-1000</option>
            <option value="1001-3000">1001-3000</option>
            <option value="mayor-3000">>3000</option>
        </select> <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>