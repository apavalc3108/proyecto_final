<?php
session_start();

if (!isset($_SESSION['db_host'], $_SESSION['db_name'], $_SESSION['db_user'], $_SESSION['db_password'])) {
    die("Faltan datos de conexión. Vuelve a iniciar sesión.");
}

$host = $_SESSION['db_host'];
$dbname = $_SESSION['db_name'];
$user = $_SESSION['db_user'];
$password = $_SESSION['db_password'];

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $logs = $pdo->query("SELECT * FROM logs_conexion ORDER BY fecha DESC")->fetchAll();

    echo "<h2>Logs de Conexión</h2>";
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Base de Datos</th>
        <th>Estado</th>
        <th>Mensaje</th>
        <th>Fecha</th>
    </tr>";

    foreach ($logs as $log) {
        echo "<tr>
            <td>{$log['id']}</td>
            <td>{$log['usuario']}</td>
            <td>{$log['base_datos']}</td>
            <td>{$log['estado']}</td>
            <td>{$log['mensaje']}</td>
            <td>{$log['fecha']}</td>
        </tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error al obtener logs: " . htmlspecialchars($e->getMessage());
}
?>
