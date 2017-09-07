<?php

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

class ClienteService
{
    private $cliente;
    private $clienteMapper;

    public function __construct(Cliente $cliente, ClienteMapper $clienteMapper)
    {
        $this->cliente = $cliente;
        $this->clienteMapper = $clienteMapper;
    }

    public function insert(array $data)
    {
        $cliente = $this->cliente;
        $cliente->setNome($data['nome']);
        $cliente->setEmail($data['email']);
        $cliente->setCpf($data['cpf']);

        $mapper = $this->clienteMapper;
        $result = $mapper->insert($cliente);

        return $result;
    }

    public function fetchAll()
    {
        return $this->clienteMapper->fetchAll();
    }
}