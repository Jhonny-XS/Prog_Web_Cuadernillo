<html>
<head>
<title>MySQL 01 - Consulta a BD (Agenda)</title>
</head>
<body>
<h1>Mostrar Nombres de la Agenda. BD </h1>
<?php
$dp = mysqli_connect("localhost", "root", "" ); 
mysqli_select_db($dp, "agenda");
$sql = "SELECT * FROM direcciones" ;
$resultado = mysqli_query($dp, $sql);
while ($row = mysqli_fetch_assoc($resultado)) { echo "$row[Nombre] $row[Apellido]<br>\n";
}
mysqli_close($dp);
?>
</body>
</html>