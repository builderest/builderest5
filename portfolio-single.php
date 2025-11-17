<?php include __DIR__ . '/includes/header.php'; ?>
<?php
global $portfolioProjects;
$id = (int) ($_GET['id'] ?? 1);
$project = null;
foreach ($portfolioProjects as $item) {
    if ((int) $item['id'] === $id) {
        $project = $item;
        break;
    }
}
?>
<section class="hero-secondary">
    <div class="container">
        <?php if ($project): ?>
            <p class="text-uppercase text-white-50"><?= e($project['industry']); ?></p>
            <h1 class="section-title"><?= e($project['title']); ?></h1>
            <p class="text-white-50"><?= e($project['summary']); ?></p>
        <?php else: ?>
            <h1 class="section-title">Proyecto no encontrado</h1>
        <?php endif; ?>
    </div>
</section>
<?php if ($project): ?>
<section class="py-5">
    <div class="container">
        <div class="card-gradient">
            <h3>Descripción</h3>
            <p class="text-white-50"><?= e($project['description']); ?></p>
            <a class="btn btn-sky" href="/get-quote.php">Solicitar asesoría</a>
        </div>
    </div>
</section>
<?php endif; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
