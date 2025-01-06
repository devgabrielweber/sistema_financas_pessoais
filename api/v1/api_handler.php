<?php
require_once __DIR__ . "/../../inicial/init.php";
require_once $_ENV['PROJECT_ROOT'] . '/controllers/redirecionadorController.php';
require_once $_ENV['PROJECT_ROOT'] . '/api/v1/index.php';

function setRotasAPI($uri, $rota_interna, $varRotas)
{
    array_push($varRotas, [$uri => $rota_interna]);
}

function redirecionarAPI($uri, $dados, $redirecionadorController, $rotasApi)
{
    file_put_contents($_ENV['PROJECT_ROOT'] . '/saida_rotas.txt', "\n\nchegou no redirecionar API, as rotas salvas são: " . json_encode($rotasApi), FILE_APPEND);

    $redirecionadorController->redirecionar($rotasApi, $dados, 'api');
}





?>