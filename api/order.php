<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Minfr\PApp\Service\OrderCalculator;
use Minfr\PApp\Database\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $pizza = $data['pizza'] ?? '';
    $size = $data['size'] ?? 21;
    $sauce = $data['sauce'] ?? '';

    try {
        $database = new Database();
        $orderCalculator = new OrderCalculator($database);
        $totalPrice = $orderCalculator->calculateTotal($pizza, $size, $sauce);

        echo json_encode([
            'success' => true,
            'total' => $totalPrice,
            'message' => "Заказ: {$pizza}, {$size} см, соус: {$sauce}. Сумма: {$totalPrice} BYN."
        ], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Ошибка: ' . $e->getMessage()
        ]);
    }
}
