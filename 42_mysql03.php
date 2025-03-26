<html>
<head>
    <title>Introducir Direcciones</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <h3>Introducir direcciones</h3>
    <?php
    // Incluir el archivo de conexión
    include("acceso.inc.php");

    // Procesar el formulario si se ha enviado
    if (isset($_POST['submit'])) {
        // Validar los campos
        if (empty($_POST['Nombre'])) {
            echo "<p>Introduzca el <b>nombre</b>.</p>";
        } elseif (strlen($_POST['Apellido']) < 3) {
            echo "<p>El apellido debe tener como mínimo <b>3</b> caracteres.</p>";
        } else {
            // Preparar la consulta SQL usando una consulta preparada
            $sql = "INSERT INTO direcciones2 (Tratamiento, Nombre, Apellido, Calle, CP, Localidad, Tel, Movil, Mail, Website, Categoria, Notas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($dp, $sql);
            if ($stmt) {
                // Sanitizar los datos y vincular los parámetros
                $tratamiento = $_POST['Tratamiento'] ?? '';
                $nombre = $_POST['Nombre'] ?? '';
                $apellido = $_POST['Apellido'] ?? '';
                $calle = $_POST['Calle'] ?? '';
                $cp = $_POST['CP'] ?? '';
                $localidad = $_POST['Localidad'] ?? '';
                $tel = $_POST['Tel'] ?? '';
                $movil = $_POST['Movil'] ?? '';
                $mail = $_POST['Mail'] ?? '';
                $website = $_POST['Website'] ?? '';
                $categoria = $_POST['Categoria'] ?? '';
                $notas = $_POST['Notas'] ?? '';

                mysqli_stmt_bind_param($stmt, "ssssssssssss", $tratamiento, $nombre, $apellido, $calle, $cp, $localidad, $tel, $movil, $mail, $website, $categoria, $notas);

                // Ejecutar la consulta
                $resultado = mysqli_stmt_execute($stmt);
                if ($resultado) {
                    echo "<p>Datos agregados con éxito.</p>";
                } else {
                    echo "<p>Datos <b>no</b> agregados: " . mysqli_error($dp) . "</p>";
                }

                // Cerrar la declaración preparada
                mysqli_stmt_close($stmt);
            } else {
                echo "<p>Error al preparar la consulta: " . mysqli_error($dp) . "</p>";
            }
        }

        // Mostrar enlaces para volver o introducir una nueva fila
        echo "[ <a href='javascript:history.back()'>Volver</a> ] - [ <a href='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>Introducir nueva fila</a> ]";
    } else {
        // Consultar las categorías para el formulario
        $sql2 = "SELECT * FROM categorias";
        $resultado2 = mysqli_query($dp, $sql2);
        if ($resultado2) {
            $campocat = "";
            while ($row = mysqli_fetch_assoc($resultado2)) {
                $categoria = htmlspecialchars($row['Categoria']);
                $campocat .= "<option value='$categoria'>$categoria</option>\n";
            }
            mysqli_free_result($resultado2);
        } else {
            echo "<p>Error al cargar las categorías: " . mysqli_error($dp) . "</p>";
            $campocat = "<option value=''>No hay categorías disponibles</option>";
        }
    }
    // Cerrar la conexión a la base de datos
    mysqli_close($dp);
    ?>

    <!-- Formulario -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table>
            <tr><td>Tratamiento:</td><td>
                <select name="Tratamiento">
                    <option value="Sr.">Sr.</option>
                    <option value="Sra.">Sra.</option>
                </select>
            </td></tr>
            <tr><td>Nombre:</td><td><input type="text" name="Nombre" value="<?php echo isset($_POST['Nombre']) ? htmlspecialchars($_POST['Nombre']) : ''; ?>"></td></tr>
            <tr><td>Apellido:</td><td><input type="text" name="Apellido" value="<?php echo isset($_POST['Apellido']) ? htmlspecialchars($_POST['Apellido']) : ''; ?>"></td></tr>
            <tr><td>Calle:</td><td><input type="text" name="Calle" value="<?php echo isset($_POST['Calle']) ? htmlspecialchars($_POST['Calle']) : ''; ?>"></td></tr>
            <tr><td>CP:</td><td><input type="text" name="CP" value="<?php echo isset($_POST['CP']) ? htmlspecialchars($_POST['CP']) : ''; ?>"></td></tr>
            <tr><td>Localidad:</td><td><input type="text" name="Localidad" value="<?php echo isset($_POST['Localidad']) ? htmlspecialchars($_POST['Localidad']) : ''; ?>"></td></tr>
            <tr><td>Tel:</td><td><input type="text" name="Tel" value="<?php echo isset($_POST['Tel']) ? htmlspecialchars($_POST['Tel']) : ''; ?>"></td></tr>
            <tr><td>Movil:</td><td><input type="text" name="Movil" value="<?php echo isset($_POST['Movil']) ? htmlspecialchars($_POST['Movil']) : ''; ?>"></td></tr>
            <tr><td>E-mail:</td><td><input type="text" name="Mail" value="<?php echo isset($_POST['Mail']) ? htmlspecialchars($_POST['Mail']) : ''; ?>"></td></tr>
            <tr><td>Website:</td><td><input type="text" name="Website" value="<?php echo isset($_POST['Website']) ? htmlspecialchars($_POST['Website']) : ''; ?>"></td></tr>
            <tr><td>Categoria:</td><td><select name="Categoria"><?php echo $campocat; ?></select></td></tr>
            <tr><td>Notas:</td><td><textarea cols="60" rows="4" name="Notas"><?php echo isset($_POST['Notas']) ? htmlspecialchars($_POST['Notas']) : ''; ?></textarea></td></tr>
            <tr><td><input type="submit" value="Introducir datos" name="submit"></td></tr>
        </table>
    </form>
    <p><a href="Practica_22.php">Cancelar y volver al listado de cursos</a></p>

</body>
</html>