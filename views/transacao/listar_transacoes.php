<sript src="/inicial/init.js"></sript>
<?php
require __DIR__ . "/../../inicial/init.php";
//require_once $_ENV["PROJECT_ROOT"] . "/controllers/categoriasController.php";
if (!isset($_SESSION['dados'])) {
    $redirecionadorController->redirecionar('transacoes.listar', 0, 'view');
    die();
}
$htmlFinal = $htmlPagina->geraGrid([
    'titulo' => 'Listar Transações',
    'dados' => $_SESSION['dados'],
    'searchCampos' => [
        'id' => 'id',
        'valor' => 'valor',
        'tipo' => 'tipo',
        'beneficiário' => 'beneficiario.nome',
        'conta' => 'conta.nome',
        'categoria' => 'categoria.nome',
    ],
    'searchRota' => 'transacoes.search',
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