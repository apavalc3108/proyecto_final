<?php
session_start();
include "recoge.php"; // Asegúrate de que solo sanea, no vacía valores válidos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = recoge("host");      // Por ejemplo: mi-db-rds.endpoint.amazonaws.com
    $dbname = recoge("dbname");  // Nombre de la base
    $user = recoge("user");      // Usuario RDS
    $password = recoge("password"); // Contraseña RDS

    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        // Almacena información necesaria (nunca la contraseña)
        $_SESSION['db_host'] = $host;
        $_SESSION['db_name'] = $dbname;
        $_SESSION['db_user'] = $user;

        // Crea tabla si no existe
        $pdo->exec("CREATE TABLE IF NOT EXISTS logs_conexion (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario VARCHAR(50) NOT NULL,
            base_datos VARCHAR(50) NOT NULL,
            estado VARCHAR(20) NOT NULL,
            mensaje TEXT NOT NULL,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        // Registra la conexión exitosa
        $stmt = $pdo->prepare("INSERT INTO logs_conexion (usuario, base_datos, estado, mensaje) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user, $dbname, "Éxito", "Conexión establecida"]);

        header("Location: verlog.php");
        exit();

    } catch (PDOException $e) {
        // Registra fallo en archivo de logs o en RDS si posible
        error_log("Error de conexión: " . $e->getMessage());

        // Redirige con error
        header("Location: form_bdatos.php?error=1");
        exit();
    }
}
?>
