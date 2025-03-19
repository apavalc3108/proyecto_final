<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

// Usuarios válidos
$usuarios = [
    "usuario1" => "clave1",
    "usuario2" => "clave2"
];

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// Validar credenciales
if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $password) {
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
    exit();
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Intentar de nuevo</a>";
}
?>

