<?php include __DIR__ . '/includes/header.php'; ?>
<?php
global $blogPosts;
$id = (int) ($_GET['id'] ?? 1);
$post = null;
foreach ($blogPosts as $entry) {
    if ((int) $entry['id'] === $id) {
        $post = $entry;
        break;
    }
}
?>
<section class="hero-secondary">
    <div class="container">
        <?php if ($post): ?>
            <p class="text-uppercase text-white-50">Blog Builderest</p>
            <h1 class="section-title"><?= e($post['title']); ?></h1>
            <p class="text-white-50">Publicado el <?= date('d M Y', strtotime($post['date'])); ?> por <?= e($post['author']); ?></p>
        <?php else: ?>
            <h1 class="section-title">Entrada no encontrada</h1>
        <?php endif; ?>
    </div>
</section>
<?php if ($post): ?>
<section class="py-5">
    <div class="container">
        <div class="card-gradient">
            <p class="lead text-white-50"><?= e($post['content']); ?></p>
            <p class="text-white-50">Comparte este insight con tu equipo de seguridad corporativa.</p>
        </div>
    </div>
</section>
<?php endif; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
