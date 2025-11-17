<?php include __DIR__ . '/includes/header.php'; ?>
<?php global $portfolioProjects; ?>
<section class="hero-secondary">
    <div class="container">
        <p class="text-uppercase text-white-50">Casos de éxito</p>
        <h1 class="section-title">Implementaciones estilo ADT</h1>
        <p class="text-white-50">Operaciones complejas en retail, logística y salud con diseño premium.</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($portfolioProjects as $project): ?>
                <div class="col-md-4">
                    <article class="card-gradient h-100">
                        <span class="badge-soft mb-3"><?= e($project['industry']); ?></span>
                        <h3 class="h4"><?= e($project['title']); ?></h3>
                        <p class="text-white-50"><?= e($project['summary']); ?></p>
                        <a class="btn btn-link text-white" href="/portfolio-single.php?id=<?= e($project['id']); ?>">Ver caso →</a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
