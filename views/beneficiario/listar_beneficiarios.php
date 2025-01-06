<sript src="/inicial/init.js"></sript>
<?php
require __DIR__ . "/../../inicial/init.php";
//require_once $_ENV["PROJECT_ROOT"] . "/controllers/beneficiariosController.php";
if (!isset($dados)) {
    $redirecionadorController->redirecionar('beneficiarios.listar', 0, 'view');
    die();
}

$htmlFinal = $htmlPagina->geraGrid([
    'titulo' => 'Listar Beneficiários',
    'dados' => $dados,
    'botoes' => [
        "cadastrar" => "beneficiarios.cadastrar"
    ],
    'acoes' => [
        'ver' => 'beneficiarios.ver',
        'deletar' => 'beneficiarios.deletar'
    ]
]);
echo $htmlFinal;
?>