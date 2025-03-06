<?php

namespace Minfr\PApp\Model;

use Minfr\PApp\Database\Database;
use PDO;

class SpecificPizza extends Pizza {
    public function calculatePrice(): float {
        $db = new Database();
        $pdo = $db->getConnection();
        
        $stmt = $pdo->prepare("SELECT price FROM pizzas WHERE name = ? AND size = ?");
        $stmt->execute([$this->name, $this->size]);
        $result = $stmt->fetch();
        
        return $result ? (float) $result['price'] : 0;
    }
}
