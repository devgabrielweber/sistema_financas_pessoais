<sript src="/inicial/init.js"></sript>
<?php
require __DIR__ . "/../../inicial/init.php";
//require_once $_ENV["PROJECT_ROOT"] . "/controllers/categoriasController.php";
if (!isset($_SESSION['dados'])) {
    $redirecionadorController->redirecionar('categorias.listar', 0, 'view');
    die();
}
$htmlFinal = $htmlPagina->geraGrid([
    'titulo' => 'Listar categorias',
    'dados' => $_SESSION['dados'],
    'searchCampos' => [
        'id' => 'id',
        'nome' => 'nome',
        'descrição' => 'descricao'
    ],
    'searchRota' => 'categorias.search',
    'botoes' => [
        'cadastrar' => 'categorias.cadastrar'
    ],
    'acoes' => [
        'ver' => 'categorias.ver',
        'deletar' => 'categorias.deletar'
    ]
]);

echo $htmlFinal;
?>