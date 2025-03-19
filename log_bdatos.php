<?php
session_start();

include "recoge.php"

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = recoge("host");
    $dbname = recoge("dbname");
    $user = recoge("user");
    $password = recoge("password");

    try {
        // Conexión única a la base de datos
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        echo "<h2>Conexión exitosa a la base de datos: $dbname</h2>";

        // Crear tabla de logs si no existe
        $pdo->exec("CREATE TABLE IF NOT EXISTS logs_conexion (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario VARCHAR(50) NOT NULL,
            base_datos VARCHAR(50) NOT NULL,
            estado VARCHAR(20) NOT NULL,
            mensaje TEXT NOT NULL,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        // Guardar el intento de conexión en la tabla logs_conexion
        $stmt = $pdo->prepare("INSERT INTO logs_conexion (usuario, base_datos, estado, mensaje) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user, $dbname, "Éxito", "Conexión establecida"]);

        // Redireccionar a la página de visualización de logs
        header("Location: verlog.php?host=$host&dbname=$dbname&user=$user&password=$password");
        exit();

    } catch (PDOException $e) {
        // Redirigir a login.php con un mensaje de error en la URL
        header("Location: form_bdatos.php?error=1");
        exit();
    }
}
?>

