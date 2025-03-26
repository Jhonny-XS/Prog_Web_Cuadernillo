<html>
<head>
    <title>Práctica 15 - Formulario (Control Textarea)</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 15 - Formulario (Control Textarea)</h1>
    <form action="Practica_15_Pro.php" method="post">
        <p>Complete los datos para el contrato:</p>
        Ciudad: <br>
        <input type="text" name="ciudad" required> <br>
        Empresa: <br>
        <input type="text" name="empresa" required> <br>
        Representante: <br>
        <input type="text" name="representante" required> <br>
        Domicilio de la empresa: <br>
        <input type="text" name="domicilio_empresa" required> <br>
        Nombre del empleado: <br>
        <input type="text" name="empleado" required> <br>
        Domicilio del empleado: <br>
        <input type="text" name="domicilio_empleado" required> <br>
        <br>
        <p>Contrato:</p>
        <textarea rows="6" cols="80" readonly>
En la ciudad de [……..], se acuerda entre la Empresa [……..] representada por el Sr. [……..] en su carácter de Apoderado, con domicilio en la calle [……..] y el Sr. [……..], futuro empleado con domicilio en [……..], celebrar el presente contrato a Plazo Fijo, de acuerdo a la normativa vigente de los artículos 90, 92, 93, 94, 95 y concordantes de la Ley de Contrato de Trabajo No. 20744.
        </textarea>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>