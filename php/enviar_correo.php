<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo_destino = $_POST["correo_destino"];
    $asunto = "Respuesta a tu solicitud";
    $mensaje = $_POST["respuesta"];

    
    $cabeceras = "From: tu_correo@gmail.com" . "\r\n" .
        "Reply-To: tu_correo@gmail.com" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    
    if (mail($correo_destino, $asunto, $mensaje, $cabeceras)) {
        echo "La respuesta ha sido enviada exitosamente.";
    } else {
        echo "Error al enviar la respuesta.";
    }
}
?>
