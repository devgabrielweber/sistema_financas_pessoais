<?php
require_once __DIR__ . '/api_handler.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json, charset=UTF-8");



class rotasAPI
{
    private $rotas;
    public function __construct()
    {
        $this->rotas = [];
    }

    public function setRotasAPI($uri, $rota)
    {
        $this->rotas[$uri] = $rota;
    }

    public function getRotasAPI($uri)
    {
        return $this->rotas[$uri];
    }
}

$rotasAPI = new rotasAPI();
require_once __DIR__ . '/rotas_api.php';

$request = [
    "uri" => explode('/', $_SERVER['REQUEST_URI']),
    "metodo" => $_SERVER['REQUEST_METHOD']
];

$request['endpoint'] = $request['uri'][3];

redirecionarAPI('cliente', 0, $redirecionadorController, $rotasAPI->getRotasAPI('cliente'))

    ?>