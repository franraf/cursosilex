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
}