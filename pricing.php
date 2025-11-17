<?php include __DIR__ . '/includes/header.php'; ?>
<?php global $pricingPlans; ?>
<section class="hero-secondary">
    <div class="container">
        <p class="text-uppercase text-white-50">Pricing</p>
        <h1 class="section-title">Planes diseñados para empresas exigentes</h1>
        <p class="text-white-50">Comparte el tamaño de tu operación y ajustamos hardware, instalación y monitoreo a medida.</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($pricingPlans as $plan): ?>
                <div class="col-md-4">
                    <div class="pricing-card h-100 d-flex flex-column">
                        <h3><?= e($plan['name']); ?></h3>
                        <p class="text-white-50"><?= e($plan['frequency']); ?></p>
                        <div class="price mb-3">$<?= e($plan['price']); ?></div>
                        <ul class="text-white-50 flex-grow-1">
                            <?php foreach ($plan['features'] as $feature): ?>
                                <li><?= e($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a class="btn btn-sky mt-4" href="get-quote.php">Choose Plan</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
