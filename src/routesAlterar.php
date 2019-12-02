<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/alterar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/alterar/' route");

        return $container->get('renderer')->render($response, 'alterar.phtml', $args);


    });

    $app->post('/alterar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/alterar/' route");

        $conexao = $container->get('pdo');

        $adicionar = $_POST;

        $id = $adicionar['id'];

        $modelo = $adicionar['modelo'];

        $marca = $adicionar['marca'];

        $ano = $adicionar['ano'];

        //  foreach ($_SESSION['carro'] as $id) {
        //  if ($id[0]['id'] == $adicionar['id']){
         $resultSet = $conexao->query("UPDATE carro SET modelo = '$modelo',marca ='$marca',ano = '$ano' WHERE id LIKE $id ");
        //  }
        // }

        



        return $container->get('renderer')->render($response, 'alterar.phtml', $args);


    });


};
