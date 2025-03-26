<html>
<head>
    <title>Práctica 13 - Formulario (Control Checkbox)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 13 - Formulario (Control Checkbox)</h1>
    <form action="Practica_13_Pro.php" method="post">
        Nombre: <br>
        <input type="text" name="nombre" required> <br>
        Selecciona los deportes que practicas: <br>
        <input type="checkbox" name="deportes[]" value="futbol"> Fútbol <br>
        <input type="checkbox" name="deportes[]" value="basket"> Básquet <br>
        <input type="checkbox" name="deportes[]" value="tenis"> Tenis <br>
        <input type="checkbox" name="deportes[]" value="voley"> Voley <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>