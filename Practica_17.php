<html>
<head>
    <title>Práctica 17 - Pedido de Pizzas</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h1>Práctica 17 - Pedido de Pizzas</h1>
    <form action="Practica_17_Pro.php" method="post">
        Nombre: <br>
        <input type="text" name="nombre" required> <br>
        Dirección: <br>
        <input type="text" name="direccion" required> <br>
        Jamón y queso: <input type="checkbox" name="jamon_queso"> 
        Cantidad: <input type="number" name="cantidad_jamon_queso" min="0" value="0"> <br>
        Napolitana: <input type="checkbox" name="napolitana"> 
        Cantidad: <input type="number" name="cantidad_napolitana" min="0" value="0"> <br>
        Mozzarella: <input type="checkbox" name="mozzarella"> 
        Cantidad: <input type="number" name="cantidad_mozzarella" min="0" value="0"> <br>
        <br>
        <input type="submit" name="confirmar" value="Confirmar">
    </form>
</body>
</html>