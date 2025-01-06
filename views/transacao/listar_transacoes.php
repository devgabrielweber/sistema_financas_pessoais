<sript src="/inicial/init.js"></sript>
<?php
require __DIR__ . "/../../inicial/init.php";
//require_once $_ENV["PROJECT_ROOT"] . "/controllers/categoriasController.php";
if (!isset($dados)) {
    $redirecionadorController->redirecionar('transacoes.listar', 0, 'view');
    die();
}
$htmlFinal = $htmlPagina->geraGrid([
    'titulo' => 'Listar transações',
    'dados' => $dados,
    'botoes' => [
        'cadastrar' => 'transacoes.cadastrar'
    ],
    'acoes' => [
        'ver' => 'transacoes.ver',
        'deletar' => 'transacoes.deletar'
    ]
]);

echo $htmlFinal;
?>