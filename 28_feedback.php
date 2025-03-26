<?php
// Procesar el formulario antes de enviar cualquier contenido HTML
if (isset($_POST['Mail']) && $_POST['Mail'] != "" && isset($_POST['message'])) {
    $receiverMail = "tudireccion@tudominio.es"; // Dirección de correo del receptor
    $userMail = filter_var($_POST['Mail'], FILTER_SANITIZE_EMAIL); // Sanitizar el correo del usuario
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8'); // Sanitizar el mensaje

    // Validar que el correo del usuario sea válido
    if (filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
        // Preparar el encabezado del correo
        $headers = "From: $userMail\r\n";
        $headers .= "Reply-To: $userMail\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Enviar el correo
        if (mail($receiverMail, "¡Tienes correo nuevo!", $message, $headers)) {
            echo "<p>Gracias por enviarme tu opinión.</p>\n";
        } else {
            echo "<p>Lo siento, ha ocurrido un error al enviar el correo.</p>\n";
        }
    } else {
        echo "<p>Por favor, introduce una dirección de correo válida.</p>\n";
    }
    exit(); // Detener la ejecución después de procesar el formulario
}
?>

<html>
<head>
    <title>Un pequeño mailer para recopilar la opinión</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>Feedback-Mailer</h1>
    <p>¡Envíame un e-mail!</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Tu dirección de e-mail: <br>
        <input type="email" name="Mail" required><br>
        Tu comentario: <br>
        <textarea name="message" rows="5" cols="50" required></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>