<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;
use Silex\Cliente\Cliente;
use Silex\Cliente\ClienteAggregator;

$response = new Response();

$app->get("/", function() use ($response){
    $response->setContent("Ola mundo!");
    return $response;
});

$app->get("/ola/{nome}", function($nome) {
    return "Ola {$nome}";
});

$app->get("/clientes", function() {
    $clientes = new ClienteAggregator();
    $cli1 = new Cliente();
    $cli2 = new Cliente();
    $cli1->setNome("Rafa1");
    $cli1->setEmail("rafa1@rafa.com");
    $cli1->setCpf(12345678901);
    $cli2->setNome("Rafa2");
    $cli2->setEmail("rafa2@rafa.com");
    $cli2->setCpf(23456789012);
    $clientes->addCliente($cli1);
    $clientes->addCliente($cli2);
    $json = array();
    foreach ($clientes->getClientes() as $cliente)
    {
        $post_data = array('Nome' => $cliente->getNome(), 'Email' => $cliente->getEmail(), 'CPF' => $cliente->getCPF());
        $json = json_encode($post_data);
    }

    return json_encode($json);
});

$app->run();
