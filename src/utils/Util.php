<?php

namespace App\Utils;

class Util {
    /**
     * Retorna o ambiente atual com base no nome do servidor.
     *
     * @return string O ambiente atual: 'prod', 'stage', 'dev', ou 'local'.
    */
    public static function getCurrentEnvironment(): string
    {
        $enviromentMap = [
            'sistemaselecao_php' => 'prod',
            'local.sistemaselecao_php' => 'local'
        ];

        return $enviromentMap[$_SERVER['SERVER_NAME']] ?? 'local';
    }
}