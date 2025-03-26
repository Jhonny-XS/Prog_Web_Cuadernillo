<html>
<head>
    <title>Práctica 12 - Formulario (Control Radio)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 12 - Formulario (Control Radio)</h1>
    <form action="Practica_12_Pro.php" method="post">
        Nombre: <br>
        <input type="text" name="nombre" required> <br>
        Nivel de estudios: <br>
        <input type="radio" name="estudios" value="sin_estudios" required> No tiene estudios <br>
        <input type="radio" name="estudios" value="primarios"> Estudios primarios <br>
        <input type="radio" name="estudios" value="secundarios"> Estudios secundarios <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>