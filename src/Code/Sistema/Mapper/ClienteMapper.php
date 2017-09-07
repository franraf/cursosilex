<?php

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{
    public function insert(Cliente $cliente)
    {
        return [
            'nome' => 'Rafa',
            'email' => 'rafa@rafa.com',
            'cpf' => '12345678901'
        ];
    }

    public function fetchAll()
    {
        $dados[0]['nome'] = "Rafa1";
        $dados[0]['email'] = "rafa1@rafa.com";
        $dados[0]['cpf'] = "12345678901";

        $dados[1]['nome'] = "Rafa2";
        $dados[1]['email'] = "rafa2@rafa.com";
        $dados[1]['cpf'] = "23456789012";

        return $dados;
    }
}