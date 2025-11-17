<?php
require_once __DIR__ . '/../app/init.php';

if (empty($_SESSION['admin'])) {
    header('Location: /admin/login.php');
    exit;
}

$themeFile = __DIR__ . '/../storage/theme.json';
$currentTheme = json_decode((string) file_get_contents($themeFile), true, 512, JSON_THROW_ON_ERROR);
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentTheme['primary'] = $_POST['primary'] ?? '#22a7ff';
    file_put_contents($themeFile, json_encode($currentTheme, JSON_PRETTY_PRINT));
    $message = 'Configuración guardada';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/admin.css">
</head>
<body>
<div class="admin-shell">
    <aside class="admin-sidebar">
        <h2>Builderest Admin</h2>
        <a href="/admin/index.php">Resumen</a>
        <a href="/admin/quotes.php">Get a Quote</a>
        <a href="/admin/settings.php">Configuración</a>
        <a href="/admin/logout.php">Cerrar sesión</a>
    </aside>
    <section class="admin-content">
        <h1 class="h3 mb-4">Apariencia del sitio</h1>
        <?php if ($message): ?><div class="alert alert-success"><?= e($message); ?></div><?php endif; ?>
        <form method="post" class="card-lite" style="max-width:480px;">
            <div class="mb-3">
                <label class="form-label">Color primario</label>
                <input type="color" class="form-control form-control-color" value="<?= e($currentTheme['primary']); ?>" name="primary">
            </div>
            <button class="btn btn-sky" type="submit">Guardar cambios</button>
        </form>
    </section>
</div>
</body>
</html>
