<?php
require_once __DIR__ . '/../app/init.php';
$services = request_services();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Builderest Security</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css'); ?>">
    <link rel="icon" type="image/svg+xml" href="<?= asset('assets/img/logo.svg'); ?>">
</head>
<body>
<header class="site-header">
    <div class="container d-flex align-items-center justify-content-between">
        <a class="logo d-flex align-items-center" href="/index.php">
            <img src="<?= asset('assets/img/logo.svg'); ?>" alt="Builderest" height="40">
            <span class="ms-2 fw-bold">Builderest</span>
        </a>
        <nav class="primary-nav d-none d-lg-flex">
            <a href="/services.php">Servicios</a>
            <a href="/pricing.php">Planes</a>
            <a href="/portfolio.php">Casos</a>
            <a href="/blog.php">Blog</a>
            <a href="/about.php">Nosotros</a>
            <a href="/contact.php">Contacto</a>
        </nav>
        <div class="header-cta d-none d-lg-flex">
            <a class="btn btn-outline-light" href="/get-quote.php">Solicitar Demo</a>
        </div>
        <button class="menu-toggle d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileNav" aria-controls="mobileNav">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>
<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileNav">
    <div class="offcanvas-header">
        <h5>Builderest</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
        <a class="mobile-link" href="/services.php">Servicios</a>
        <a class="mobile-link" href="/pricing.php">Planes</a>
        <a class="mobile-link" href="/portfolio.php">Casos</a>
        <a class="mobile-link" href="/blog.php">Blog</a>
        <a class="mobile-link" href="/about.php">Nosotros</a>
        <a class="mobile-link" href="/contact.php">Contacto</a>
        <a class="btn btn-sky w-100 mt-3" href="/get-quote.php">Get a Quote</a>
    </div>
</div>
<main>
