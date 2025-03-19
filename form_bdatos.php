<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión a la Base de Datos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            // Si hay un error en la URL, muestra el mensaje de error
            echo "<p style='color: red;'>Error: Alguno de los campos introducidos es incorrecto.</p>";
        }
        ?>
    <div class="container">
        <h2>Introduce los datos de conexión</h2>
        <form action="log_bdatos.php" method="post">
            <label for="host">Host:</label>
            <input type="text" name="host" required placeholder="Ej: localhost">

            <label for="dbname">Nombre de la Base de Datos:</label>
            <input type="text" name="dbname" required placeholder="Ej: mi_base">

            <label for="user">Usuario:</label>
            <input type="text" name="user" required placeholder="Ej: root">

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required placeholder="obligatoria">

            <button type="submit">Conectar</button>
        </form>
    </div>
</body>
</html>

