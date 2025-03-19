<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener la IP pública del servidor usando un servicio externo
$public_ip = file_get_contents('http://checkip.amazonaws.com');

// Generar la URL del stream RTMP con la IP pública
$stream_url = "rtmp://$public_ip/live/stream"; // Usar la IP pública en la URL de RTMP
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Streaming</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="stream">
        <h2>Streaming en Vivo</h2>
        
        <!-- Mostrar la URL para copiar -->
        <p>Para ver el streaming en VLC, copia el siguiente enlace y pégalo en VLC: </p>
        <p>
            <input type="text" value="<?php echo $stream_url; ?>" id="streamLink" readonly>
            <button onclick="copyLink()">Copiar enlace</button>
        </p>
         <!-- Función de JavaScript que permite copiar el enlace al portapapeles -->
        <script>
            function copyLink() { // Función que se ejecuta cuando el usuario hace clic en el botón "Copiar enlace"
                var copyText = document.getElementById("streamLink"); // Obtiene el campo de texto con la URL
                copyText.select(); // Selecciona el texto dentro del campo de texto
                copyText.setSelectionRange(0, 99999); // Para dispositivos móviles, asegura que todo el texto esté seleccionado
                document.execCommand("copy"); // Copia el texto seleccionado al portapapeles
                alert("Enlace copiado: " + copyText.value); // Muestra un mensaje confirmando que el enlace fue copiado
            }
        </script>
        <br>
        <a href="dashboard.php">Volver al Panel</a>
    </div>
</body>
</html>

