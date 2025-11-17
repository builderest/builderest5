<?php
require_once __DIR__ . '/../app/init.php';

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($user === 'admin' && $pass === 'builderest') {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit;
    }

    $error = 'Credenciales inválidas';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Builderest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="min-height:100vh;">
    <div class="card-lite" style="width:360px;">
        <h1 class="h4 mb-3">Panel Builderest</h1>
        <?php if ($error): ?><div class="alert alert-danger"><?= e($error); ?></div><?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="user" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="pass" required>
            </div>
            <button class="btn btn-sky w-100" type="submit">Acceder</button>
        </form>
    </div>
</div>
</body>
</html>
