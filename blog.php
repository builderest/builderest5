<?php include __DIR__ . '/includes/header.php'; ?>
<?php global $blogPosts; ?>
<section class="hero-secondary">
    <div class="container">
        <p class="text-uppercase text-white-50">Blog</p>
        <h1 class="section-title">Insights Builderest</h1>
        <p class="text-white-50">Tendencias en monitoreo, ciberseguridad y experiencia de clientes corporativos.</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($blogPosts as $post): ?>
                <div class="col-md-4">
                    <article class="card-gradient h-100">
                        <span class="badge-soft mb-3"><?= date('M d, Y', strtotime($post['date'])); ?></span>
                        <h3 class="h4"><?= e($post['title']); ?></h3>
                        <p class="text-white-50">
                            <?= e($post['excerpt']); ?>
                        </p>
                        <a class="btn btn-link text-white" href="blog-single.php?id=<?= e($post['id']); ?>">Leer más →</a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
