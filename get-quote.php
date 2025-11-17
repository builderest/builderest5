<?php
use App\Models\QuoteModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

include __DIR__ . '/includes/header.php';

$errors = [];
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validate_csrf($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Token inválido. Actualiza la página.';
    }

    $data = [
        'name' => trim($_POST['name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'service_type' => trim($_POST['service_type'] ?? ''),
        'budget' => trim($_POST['budget'] ?? ''),
        'message' => trim($_POST['message'] ?? ''),
    ];

    if ($data['name'] === '' || $data['email'] === '') {
        $errors[] = 'Nombre y correo son obligatorios.';
    }

    if (empty($errors)) {
        (new QuoteModel())->create($data);

        if (class_exists(PHPMailer::class)) {
            try {
                $mailer = new PHPMailer(true);
                $mailer->isSMTP();
                $mailer->Host = getenv('SMTP_HOST') ?: 'smtp.example.com';
                $mailer->SMTPAuth = true;
                $mailer->Username = getenv('SMTP_USER') ?: 'user@example.com';
                $mailer->Password = getenv('SMTP_PASS') ?: 'secret';
                $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mailer->Port = (int) (getenv('SMTP_PORT') ?: 587);

                $mailer->setFrom($mailer->Username, 'Builderest Quotes');
                $mailer->addAddress(getenv('SALES_INBOX') ?: 'sales@example.com');
                $mailer->Subject = 'Nueva cotización Builderest';
                $mailer->Body = sprintf(
                    "Nombre: %s\nEmail: %s\nTeléfono: %s\nServicio: %s\nPresupuesto: %s\nMensaje: %s",
                    $data['name'],
                    $data['email'],
                    $data['phone'],
                    $data['service_type'],
                    $data['budget'],
                    $data['message']
                );
                $mailer->send();
            } catch (MailException $exception) {
                error_log('Email error: ' . $exception->getMessage());
            }
        }

        $success = 'Tu solicitud ha sido enviada. Nuestro equipo te contactará en breve.';
    }
}
?>
<section class="hero-secondary">
    <div class="container">
        <p class="text-uppercase text-white-50">Cotización</p>
        <h1 class="section-title">Get a Quote</h1>
        <p class="text-white-50">Comparte tus requerimientos y configuramos un plan estilo ADT.</p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card-gradient">
                    <h3>Formulario</h3>
                    <?php if ($success): ?>
                        <div class="alert alert-success mt-3"><?= e($success); ?></div>
                    <?php endif; ?>
                    <?php if ($errors): ?>
                        <div class="alert alert-danger mt-3">
                            <?php foreach ($errors as $error): ?>
                                <div><?= e($error); ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form class="mt-4" method="post">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" name="name" value="<?= e($_POST['name'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= e($_POST['email'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input class="form-control" name="phone" value="<?= e($_POST['phone'] ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de servicio</label>
                            <select class="form-select" name="service_type">
                                <?php foreach ($services as $service): ?>
                                    <option value="<?= e($service['name']); ?>" <?= (($_POST['service_type'] ?? '') === $service['name']) ? 'selected' : ''; ?>>
                                        <?= e($service['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Presupuesto estimado</label>
                            <input class="form-control" name="budget" value="<?= e($_POST['budget'] ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mensaje</label>
                            <textarea class="form-control" rows="4" name="message"><?= e($_POST['message'] ?? ''); ?></textarea>
                        </div>
                        <button class="btn btn-sky w-100" type="submit">Enviar solicitud</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card-gradient h-100">
                    <h4>¿Qué sigue?</h4>
                    <ol class="text-white-50">
                        <li>Validamos la información y te asignamos un consultor.</li>
                        <li>Preparamos propuesta técnica y financiera.</li>
                        <li>Coordinamos visita o demo virtual.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
