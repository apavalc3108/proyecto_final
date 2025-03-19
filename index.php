<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Streaming Server</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="index">
        <img src="logo.png" alt="Logo de APA FLIX" class="logo" width="300" height="300">
        <h2>Bienvenido al servidor de streaming</h2>
        <a href="login.php">Iniciar sesión</a>
    </div>
</body>
</html>

