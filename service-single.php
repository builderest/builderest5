<?php
use App\Models\ServiceModel;

include __DIR__ . '/includes/header.php';

$id = (int) ($_GET['id'] ?? 1);
$serviceModel = new ServiceModel();
$service = $serviceModel->find($id);
?>
<section class="hero-secondary">
    <div class="container">
        <?php if ($service): ?>
            <p class="text-uppercase text-white-50">Servicio</p>
            <h1 class="section-title"><?= e($service['name']); ?></h1>
            <p class="text-white-50"><?= e($service['description']); ?></p>
            <a class="btn btn-sky" href="get-quote.php">Solicitar cotización</a>
        <?php else: ?>
            <h1 class="section-title">Servicio no encontrado</h1>
            <p class="text-white-50">El servicio solicitado no existe.</p>
        <?php endif; ?>
    </div>
</section>
<?php if ($service): ?>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card-gradient mb-4">
                    <h3>Descripción detallada</h3>
                    <p class="text-white-50"><?= e($service['description']); ?></p>
                    <ul class="text-white-50">
                        <li>Arquitectura redundante y monitoreo SOC</li>
                        <li>Protocolos de escalación estilo ADT</li>
                        <li>Integración con paneles móviles y API</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-gradient">
                    <h4>Beneficios Clave</h4>
                    <p class="text-white-50">Cobertura nacional, soporte 24/7 y SLA premium.</p>
                    <a class="btn btn-outline-light w-100" href="contact.php">Hablar con un experto</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
