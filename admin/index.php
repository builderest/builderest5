<?php
use App\Models\QuoteModel;

require_once __DIR__ . '/../app/init.php';

if (empty($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$quoteModel = new QuoteModel();
$quotes = $quoteModel->all();
$totalQuotes = count($quotes);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Builderest</title>
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
        <h1 class="h3 mb-4">Panel general</h1>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-lite">
                    <p class="text-uppercase text-white-50 small">Cotizaciones</p>
                    <h2 class="display-6"><?= $totalQuotes; ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-lite">
                    <p class="text-uppercase text-white-50 small">Servicios activos</p>
                    <h2 class="display-6"><?= count($services); ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-lite">
                    <p class="text-uppercase text-white-50 small">Planes</p>
                    <h2 class="display-6"><?= isset($pricingPlans) ? count($pricingPlans) : 0; ?></h2>
                </div>
            </div>
        </div>
        <div class="card-lite mt-4">
            <h4>Últimas cotizaciones</h4>
            <div class="table-responsive mt-3">
                <table class="table table-dark table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Servicio</th>
                            <th>Presupuesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($quotes, 0, 5) as $quote): ?>
                            <tr>
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
