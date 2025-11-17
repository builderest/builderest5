<?php include __DIR__ . '/includes/header.php'; ?>
<section class="hero-secondary">
    <div class="container">
        <p class="text-uppercase text-white-50">FAQ</p>
        <h1 class="section-title">Preguntas frecuentes</h1>
        <p class="text-white-50">Todo lo que necesitas saber antes de migrar tu seguridad con Builderest.</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="accordion" id="faqAccordion">
            <?php $faqs = [
                ['q' => '¿Cuál es el tiempo de instalación?', 'a' => 'Entre 2 y 6 semanas según el número de sedes y hardware requerido.'],
                ['q' => '¿Ofrecen monitoreo 24/7?', 'a' => 'Sí, contamos con centros redundantes estilo ADT y protocolos certificados.'],
                ['q' => '¿Cómo funciona el soporte?', 'a' => 'Equipo dedicado con SLA de 30 minutos para tickets críticos.'],
            ]; ?>
            <?php foreach ($faqs as $index => $item): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $index; ?>">
                        <button class="accordion-button<?= $index ? ' collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>">
                            <?= e($item['q']); ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $index; ?>" class="accordion-collapse collapse<?= $index ? '' : ' show'; ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= e($item['a']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
