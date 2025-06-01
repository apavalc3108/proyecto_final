<?php
session_start();

include "recoge.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = recoge("host");
    $dbname = recoge("dbname");
    $user = recoge("user");
    $password = recoge("password");

    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        // Almacena en sesión en lugar de pasar por URL
        $_SESSION['db_host'] = $host;
        $_SESSION['db_name'] = $dbname;
        $_SESSION['db_user'] = $user;
        // ¡NUNCA almacenes la contraseña en sesión o URL!

        $pdo->exec("CREATE TABLE IF NOT EXISTS logs_conexion (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario VARCHAR(50) NOT NULL,
            base_datos VARCHAR(50) NOT NULL,
            estado VARCHAR(20) NOT NULL,
            mensaje TEXT NOT NULL,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $stmt = $pdo->prepare("INSERT INTO logs_conexion (usuario, base_datos, estado, mensaje) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user, $dbname, "Éxito", "Conexión establecida"]);

        header("Location: verlog.php");
        exit();

    } catch (PDOException $e) {
        error_log("Error de conexión: " . $e->getMessage());  // Registra el error
        header("Location: form_bdatos.php?error=1");
        exit();
    }
}
?>
