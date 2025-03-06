<?php

namespace Minfr\PApp\Service;

use Minfr\PApp\Database\Database;
use Minfr\PApp\Service\CurrencyConverter;
use PDO;
use Exception;

class OrderCalculator {
    private PDO $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getConnection();
    }

    public function calculateTotal(string $pizzaName, int $size, string $sauceName): float {

        $stmt = $this->pdo->prepare("SELECT price FROM pizzas WHERE name = ? AND size_cm = ?");
        $stmt->execute([$pizzaName, $size]);
        $pizzaPrice = $stmt->fetchColumn();

        if (!$pizzaPrice) {
            throw new Exception("Пицца '{$pizzaName}' ({$size} см) не найдена!");
        }

        $stmt = $this->pdo->prepare("SELECT price FROM sauces WHERE name = ?");
        $stmt->execute([$sauceName]);
        $saucePrice = $stmt->fetchColumn();


        $totalUSD = $pizzaPrice + $saucePrice;

        return CurrencyConverter::convertToBYN($totalUSD);
    }
}
