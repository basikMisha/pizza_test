<?php

namespace Minfr\PApp\Database;

use PDO;
use PDOException;

class Database {
    private PDO $pdo;

    public function __construct() {
        $config = parse_ini_file(__DIR__ . '/../Config/db.ini', true)['database'];
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Сonnection error: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
