<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Conexión</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

function recoge($var) {
    return isset($_POST[$var]) ? trim(htmlspecialchars($_POST[$var], ENT_QUOTES, "UTF-8")) : "";
}

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
    echo "<h2>Error al obtener logs:</h2> " . $e->getMessage();
}
?>

