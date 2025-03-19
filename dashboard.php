<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Streaming</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard-simple">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
        <div class="dashboard-options">
            <a href="stream.php" class="dashboard-btn">
                <i class="fas fa-video"></i> Ver Streaming
            </a>
            <a href="logout.php" class="dashboard-btn">
                <i class="fas fa-sign-out-alt"></i> Desconectarse
            </a>
             <a href="form_bdatos.php" class="dashboard-btn">
                <i class="fas fa-database"></i> Log en la Base de Datos
            </a>
        </div>
    </div>
</body>
</html>
