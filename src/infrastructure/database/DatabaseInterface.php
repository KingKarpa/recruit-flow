<?php
namespace App\Infrastructure\Database;

interface DatabaseInterface
{
    /**
     * Salva um novo registro
     * @param string $query Query
     * @param array $data Dados para salvar (ex: ['column' => value])
     * @return int O ID do registro inserido pela operação
     */
    public function insert(string $query, array $params): int|string;

    /**
     * Encontra um registro com base um determinado ID
     * Caso bem sucedido, retorna um objeto único
     * @param string $query Query
     * @param array $params Parâmetros para busca (ex: ['column' => value])
     * @return object|false
     */
    public function findOne(string $query, array $params): object|false;

    /**
     * Encontra um ou vários registros com base um conjunto de parâmetros
     * Retorna um array de objetos
     * @param string $query Query
     * @param array $params Parâmetros para busca (ex: ['column' => value])
     * @return array
     */
    public function findAll(string $query, array $params): array;

    /**
     * Atualiza um registro existente
     * @param string $query Query
     * @param array $data Dados para salvar (ex: ['column' => value])
     * @return int O número de registros afetados
     */
    public function update(string $query, array $params): int;

    /**
     * Deleta registros com base nos parâmetros passados
     * @param string $query Query
     * @param array $params Parâmetros para exclusão (ex: ['column' => value])
     * @return int O número de registros afetados
     */
    public function delete(string $query, array $params): int;

    /**
     * Verifica se existe um registro com base nos parâmetros passados
     * @param string $query Query
     * @param array $params Parâmetros para busca (ex: ['column' => value])
     * @return bool
     */
    public function exists(string $query, array $params): bool;
}