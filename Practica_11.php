<html>
<head>
    <title>Práctica 11 - Formulario</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
</head>
<body>
    <h1>Práctica 11 - Formulario</h1>
    <div class="form-container">
        <form action="Practica_11_Pro.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" min="0" max="150" required>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>