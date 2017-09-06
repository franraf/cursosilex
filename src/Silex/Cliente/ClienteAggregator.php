<?php

namespace Silex\Cliente;

class ClienteAggregator
{
    private $clientes = array();

    public function addCliente(Cliente $cliente)
    {
        $this->clientes[] = $cliente;
    }

    public function getClientes()
    {
        return $this->clientes;
    }
}