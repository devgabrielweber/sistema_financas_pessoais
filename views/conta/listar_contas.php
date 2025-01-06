<sript src="/inicial/init.js"></sript>
<?php
require __DIR__ . "/../../inicial/init.php";
//require_once $_ENV["PROJECT_ROOT"] . "/controllers/contasController.php";
if (!isset($dados)) {
    $redirecionadorController->redirecionar('contas.listar', 0, 'view');
    die();
}
$htmlFinal = $htmlPagina->geraGrid([
    'titulo' => 'Listar Contas',
    'dados' => $dados,
    'botoes' => [
        'cadastrar' => 'contas.cadastrar'
    ],
    'acoes' => [
        'ver' => 'contas.ver',
        'deletar' => 'contas.deletar'
    ]
]);

echo $htmlFinal;
?>