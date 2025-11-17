<?php include __DIR__ . '/includes/header.php'; ?>
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge">ADT Inspired Experience</span>
                <h1>Seguridad corporativa con monitoreo inteligente 24/7</h1>
                <p class="lead text-white-50">Builderest combina hardware profesional, automatización y equipos SOC certificados para empresas multisede.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-sky" href="/get-quote.php">Get a Quote</a>
                    <a class="btn btn-outline-light" href="/services.php">Explorar servicios</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-gradient">
                    <h5>Estadísticas en vivo</h5>
                    <div class="row text-center g-4 mt-2">
                        <div class="col-4">
                            <h3 class="fw-bold">350+</h3>
                            <p class="text-white-50 small">Sitios monitoreados</p>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold">7s</h3>
                            <p class="text-white-50 small">Tiempo de respuesta</p>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold">98%</h3>
                            <p class="text-white-50 small">Satisfacción NPS</p>
                        </div>
                    </div>
                    <div class="timeline mt-4">
                        <div class="timeline-step">
                            <h6>01. Discovery</h6>
                            <p class="text-white-50">Evaluamos riesgos, cobertura y regulaciones.</p>
                        </div>
                        <div class="timeline-step">
                            <h6>02. Deployment</h6>
                            <p class="text-white-50">Implementación ágil tipo ADT con PM dedicado.</p>
                        </div>
                        <div class="timeline-step">
                            <h6>03. Command</h6>
                            <p class="text-white-50">Panel corporativo, reportes y analítica.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <div>
                <p class="text-uppercase text-white-50 mb-1">Servicios Core</p>
                <h2 class="section-title">Arquitectura integral estilo ADT</h2>
            </div>
            <a class="btn btn-outline-light" href="/services.php">Ver todos</a>
        </div>
        <div class="row g-4">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
                <div class="col-md-4">
                    <div class="card-gradient h-100">
                        <div class="service-icon mb-3">
                            <i class="bi bi-<?= e($service['icon']); ?>"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4><?= e($service['name']); ?></h4>
                            <span class="badge-soft"><?= e($service['badge']); ?></span>
                        </div>
                        <p class="text-white-50"><?= e($service['summary']); ?></p>
                        <a class="btn btn-link text-decoration-none text-white" href="/service-single.php?id=<?= e($service['id']); ?>">Ver detalles →</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="py-5 bg-black bg-opacity-50">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Planes preparados para escalar</h2>
                <p class="text-white-50">Modelos flexibles inspirados en ADT para empresas que exigen SLA estrictos y soporte dedicado.</p>
                <a class="btn btn-sky" href="/pricing.php">Conocer precios</a>
            </div>
            <div class="col-lg-6">
                <div class="card-gradient">
                    <h5>Integraciones principales</h5>
                    <ul class="list-unstyled text-white-50 mt-3">
                        <li>• Panel de automatización IoT</li>
                        <li>• API abierta y webhooks</li>
                        <li>• Reportes ESG y auditorías</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
