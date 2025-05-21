<?php

use App\Infrastructure\Database\DatabaseConnection;

try {
    $database = DatabaseConnection::createConnection();
} catch (Exception $e) {
    echo "Falha na conexão: " . $e->getMessage();
}