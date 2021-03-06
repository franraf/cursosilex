<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;
use Code\Sistema\Service\ClienteService;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Entity\Cliente;

$response = new Response();

$app['clienteService'] = function() {
    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();
    $clienteService = new ClienteService($clienteEntity, $clienteMapper);
    return $clienteService;
};

$app->get("/", function() use ($app){
    return $app['twig']->render('index.twig', [])->bind("index");
});

$app->get("/ola/{nome}", function($nome) use ($app) {
    return $app['twig']->render("ola.twig", ['nome' => $nome]);
});

$app->get("/list", function() use ($app) {
   $dados = $app['clienteService']->fetchAll();
   return $app['twig']->render('clientes.twig', ['clientes' => $dados])->bind("list");
});

$app->get("/clientes", function() {
    $post_data1 = array('Nome' => 'Rafa1', 'Email' => 'rafa1@rafa.com', 'CPF' => '12345678901');
    $post_data2 = array('Nome' => 'Rafa2', 'Email' => 'rafa2@rafa.com', 'CPF' => '23456789012');
    $post_data = array($post_data1, $post_data2);
    $json = json_encode($post_data);
    return $json;
});

$app->get("/cliente", function () use ($app) {
   $dados['nome'] = 'Rafa';
   $dados['email'] = 'rafa@rafa.com';
   $dados['cpf'] = '12345678901';

   $result = $app['clienteService']->insert($dados);

   return $app->json($result);
});

$app->run();
