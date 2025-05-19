<?php
namespace App\Infrastructure\Database\MySQL;
use App\Infrastructure\Database\DatabaseInterface;

use Exception;
use PDO;
use PDOException;

class MySQLDatabase implements DatabaseInterface
{
    public function __construct(private \PDO $connection) 
    {}

    public function query(string $query, array $params): \PDOStatement
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }
        catch (\PDOException $e) {
            throw new \Exception("Query failed: " . $e->getMessage());
        }
    }

    public function insert(string $query, array $params): int
    {
        $this->query($query, $params);
        return (int) $this->connection->lastInsertId();
    }

    public function findOne(string $query, array $params): object|false
    {
        $result_query = $this->query($query, $params);
        $result_object = $result_query->fetch(PDO::FETCH_OBJ);
        return $result_object;
    }

    public function findAll(string $query, array $params): array
    {
        $result_query = $this->query($query, $params);
        $result_array = $result_query->fetchAll(PDO::FETCH_OBJ);
        return $result_array;
    }

    public function update(string $query, array $params): int
    {
        $result_query = $this->query($query, $params);
        return $result_query->rowCount();
    }

    public function delete(string $query, array $params): int
    {
        $result_query = $this->query($query, $params);
        return $result_query->rowCount(); 
    }

    public function exists(string $query, array $params): bool
    {
        return !!$this->findOne($query, $params);
    }
}