<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="auth.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>
        
        <label>Contraseña:</label>
        <input type="password" name="password" required><br>
        
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>

