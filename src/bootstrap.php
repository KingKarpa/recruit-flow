<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Utils\Util;
use Dotenv\Dotenv;

try {
    $envPath = __DIR__ . '/../config/env/' . Util::getCurrentEnvironment();
    if (file_exists($envPath . '/.env')) {
        $dotenv = Dotenv::createImmutable($envPath);
        $dotenv->load();
    } else {
        throw new Exception("Arquivo .env não encontrado no ambiente: " . Util::getCurrentEnvironment());
    }
} catch (Exception $e) {
    die("Erro ao carregar as variáveis de ambiente: " . $e->getMessage());
}

require_once __DIR__ . '/../config/db.php';