<?php
use App\Models\QuoteModel;

require_once __DIR__ . '/../app/init.php';

if (empty($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$quoteModel = new QuoteModel();
$quotes = $quoteModel->all();
$filter = $_GET['service'] ?? '';

if ($filter) {
    $quotes = array_values(array_filter($quotes, fn($quote) => ($quote['service_type'] ?? '') === $filter));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="admin-shell">
    <aside class="admin-sidebar">
        <h2>Builderest Admin</h2>
        <a href="index.php">Resumen</a>
        <a href="quotes.php">Get a Quote</a>
        <a href="settings.php">Configuración</a>
        <a href="logout.php">Cerrar sesión</a>
    </aside>
    <section class="admin-content">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0">Solicitudes de cotización</h1>
                <p class="text-white-50 mb-0">Filtra por servicio y exporta la información.</p>
            </div>
            <a class="btn btn-sky" href="export-quotes.php">Exportar CSV</a>
        </div>
        <form class="row g-3 mb-4" method="get">
            <div class="col-md-6">
                <label class="form-label">Servicio</label>
                <select class="form-select" name="service" onchange="this.form.submit()">
                    <option value="">Todos</option>
                    <?php foreach ($services as $service): ?>
                        <option value="<?= e($service['name']); ?>" <?= $filter === $service['name'] ? 'selected' : ''; ?>>
                            <?= e($service['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
        <div class="card-lite">
            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Servicio</th>
                            <th>Presupuesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quotes as $quote): ?>
                            <tr>
                                <td><?= e($quote['created_at'] ?? 'N/D'); ?></td>
                                <td><?= e($quote['name'] ?? ''); ?></td>
                                <td><span class="badge-status"><?= e($quote['service_type'] ?? ''); ?></span></td>
                                <td><?= e($quote['budget'] ?? ''); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</body>
</html>
