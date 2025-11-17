<?php
use App\Models\QuoteModel;

require_once __DIR__ . '/../app/init.php';

if (empty($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$quotes = (new QuoteModel())->all();
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="quotes.csv"');

$handle = fopen('php://output', 'w');
fputcsv($handle, ['Nombre', 'Email', 'Servicio', 'Presupuesto', 'Fecha']);
foreach ($quotes as $quote) {
    fputcsv($handle, [
        $quote['name'] ?? '',
        $quote['email'] ?? '',
        $quote['service_type'] ?? '',
        $quote['budget'] ?? '',
        $quote['created_at'] ?? '',
    ]);
}
fclose($handle);
exit;
