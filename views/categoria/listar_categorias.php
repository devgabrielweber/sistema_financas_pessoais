<sript src="/inicial/init.js"></sript>
<?php
require __DIR__ . "/../../inicial/init.php";
//require_once $_ENV["PROJECT_ROOT"] . "/controllers/categoriasController.php";
if (!isset($dados)) {
    $redirecionadorController->redirecionar('categorias.listar', 0, 'view');
    die();
}
$htmlFinal = $htmlPagina->geraGrid([
    'titulo' => 'Listar categorias',
    'dados' => $dados,
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