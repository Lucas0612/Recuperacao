<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/adicionar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/adicionar/' route");

        return $container->get('renderer')->render($response, 'adicionar.phtml', $args);


    });

    $app->post('/adicionar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/adicionar/' route");

        $conexao = $container->get('pdo');

        $adicionar = $_POST;

        $resultSet = $conexao->query('INSERT INTO carro (modelo,marca,ano) VALUES("' . $adicionar['modelo'] . '","' . $adicionar['marca'] . '",
        "'.$adicionar['ano'].'")');

        
        $resultSet2 = $conexao->query('SELECT * FROM carro')->fetchAll();

        $_SESSION['carro'][] = $resultSet;
        $_SESSION['carro']['id'] = $resultSet2['id'];


        // Render index view
        return $container->get('renderer')->render($response, 'adicionar.phtml', $args);


    });

};
