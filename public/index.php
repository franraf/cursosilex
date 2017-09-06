<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;
use Silex\Cliente;

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
    foreach ($clientes as $cliente)
    {
        json_encode($cliente);
    }
});

$app->run();
