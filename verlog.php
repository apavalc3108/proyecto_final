<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Logs de Conexión</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <button onclick="window.location.href='dashboard.php'">Volver al Dashboard</button>

    <h2>Logs de Conexión</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Base de Datos</th>
                <th>Estado</th>
                <th>Mensaje</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= htmlspecialchars($log['id']) ?></td>
                <td><?= htmlspecialchars($log['usuario']) ?></td>
                <td><?= htmlspecialchars($log['base_datos']) ?></td>
                <td><?= htmlspecialchars($log['estado']) ?></td>
                <td><?= htmlspecialchars($log['mensaje']) ?></td>
                <td><?= htmlspecialchars($log['fecha']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<button class="btn-dashboard" onclick="window.location.href='dashboard.php'">Volver al Dashboard</button>
</body>
</html>
