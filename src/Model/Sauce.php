<?php

namespace Minfr\PApp\Model;

use Minfr\PApp\Database\Database;
use PDO;

class Sauce {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getPrice(): float {
        $db = new Database();
        $pdo = $db->getConnection();
        
        $stmt = $pdo->prepare("SELECT price FROM sauces WHERE name = ?");
        $stmt->execute([$this->name]);
        $result = $stmt->fetch();
        
        return $result ? (float) $result['price'] : 0;
    }
}
