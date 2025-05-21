<?php
namespace App\Infrastructure\Database;

use App\Infrastructure\Database\MySQL\MySQLDatabase;
use Exception;
use PDO;

class DatabaseConnection
{
    public static function createConnection(): DatabaseInterface
    {
        $database_type = $_ENV['DB_TYPE'];
        if ($database_type === 'mysql') {
            return new MySQLDatabase(self::connectMySQL());
        }

        throw new Exception("Tipo de banco de dados não configurado corretamente.");
    }

    private static function connectMySQL(): PDO
    {
        $data = json_decode($_ENV['DB_MySQL']);
        $dns = "mysql:host={$data->host};dbname={$data->database}";
        return new PDO($dns, $data->user, $data->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}