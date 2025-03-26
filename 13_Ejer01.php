<html>
<head>
<title>Ejercicio 01 propio</title>
</head>
<body>
<?php
// Variables
$numero1 = 10;
$numero2 = 5;

// Operaciones aritméticas
$suma = $numero1 + $numero2;
$resta = $numero1 - $numero2;
$multiplicacion = $numero1 * $numero2;
$division = $numero1 / $numero2;
$modulo = $numero1 % $numero2;
$potencia = $numero1 ** $numero2;

// Operaciones de comparación
$igual = $numero1 == $numero2;
$diferente = $numero1 != $numero2;
$mayor = $numero1 > $numero2;
$menor = $numero1 < $numero2;
$mayor_igual = $numero1 >= $numero2;
$menor_igual = $numero1 <= $numero2;

// Operaciones lógicas
$ambos_positivos = $numero1 > 0 && $numero2 > 0;
$al_menos_uno_negativo = $numero1 < 0 || $numero2 < 0;
$no_igual = !($numero1 == $numero2);

// Salida HTML
echo "<h1>Resultado de Operaciones</h1>";
echo "<p>Número 1: " . $numero1 . "</p>";
echo "<p>Número 2: " . $numero2 . "</p>";

echo "<h2>Operaciones Aritméticas</h2>";
echo "<p>Suma: " . $suma . "</p>";
echo "<p>Resta: " . $resta . "</p>";
echo "<p>Multiplicación: " . $multiplicacion . "</p>";
echo "<p>División: " . number_format($division, 2) . "</p>";
echo "<p>Módulo: " . $modulo . "</p>";
echo "<p>Potencia: " . $potencia . "</p>";

echo "<h2>Operadores de Comparación</h2>";
echo "<p>¿Son iguales? " . ($igual ? "Sí" : "No") . "</p>";
echo "<p>¿Son diferentes? " . ($diferente ? "Sí" : "No") . "</p>";
echo "<p>¿Número1 es mayor que Número2? " . ($mayor ? "Sí" : "No") . "</p>";
echo "<p>¿Número1 es menor que Número2? " . ($menor ? "Sí" : "No") . "</p>";
echo "<p>¿Número1 es mayor o igual que Número2? " . ($mayor_igual ? "Sí" : "No") . "</p>";
echo "<p>¿Número1 es menor o igual que Número2? " . ($menor_igual ? "Sí" : "No") . "</p>";

echo "<h2>Operadores Lógicos</h2>";
echo "<p>¿Ambos son positivos? " . ($ambos_positivos ? "Sí" : "No") . "</p>";
echo "<p>¿Al menos uno es negativo? " . ($al_menos_uno_negativo ? "Sí" : "No") . "</p>";
echo "<p>¿No son iguales? " . ($no_igual ? "Sí" : "No") . "</p>";
?>
</body>
</html>