<?php include __DIR__ . '/includes/header.php'; ?>
<section class="hero-secondary">
    <div class="container">
        <p class="text-uppercase text-white-50">Servicios Builderest</p>
        <h1 class="section-title">Arquitectura completa estilo ADT</h1>
        <p class="text-white-50">Selecciona uno de nuestros servicios premium para visualizar el detalle y agendar una demo personalizada.</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
                <div class="col-md-4">
                    <article class="card-gradient h-100">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="service-icon"><i class="bi bi-<?= e($service['icon']); ?>"></i></div>
                            <span class="badge-soft"><?= e($service['badge']); ?></span>
                        </div>
                        <h3 class="h4 mb-2"><?= e($service['name']); ?></h3>
                        <p class="text-white-50 mb-4"><?= e($service['summary']); ?></p>
                        <a class="btn btn-sky w-100" href="/service-single.php?id=<?= e($service['id']); ?>">Ver servicio</a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a class="btn btn-outline-light" href="/contact.php">Ver más servicios</a>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
