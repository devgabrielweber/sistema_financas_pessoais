<script src="/inicial/init.js"></script>
<?php
require_once __DIR__ . "/../../inicial/init.php";
require_once $_ENV["PROJECT_ROOT"] . "/controllers/categoriasController.php";
?>
<?php
if (isset($_POST['nome'])) {
    //var_dump($_POST);
    $categoriasController = new categoriasController();
    $dados = $categoriasController->cadastrar($_POST);
}

if (isset($_SESSION['dados'][0]['id'])) {
    $rota = 'categorias.atualizar';
} else {
    $rota = 'categorias.cadastrar';
}

// var_dump($_SESSION['dados'][0]);
// var_dump($rota);


$htmlFinal = $htmlPagina->geraForm([
    'titulo' => 'Cadastrar categorias',
    'botoes' => [
        'salvar' => [
            'tipo' => 'salvar',
            'rota' => 'categorias.cadastrar'
        ],
        'fechar' => [
            'tipo' => 'fechar',
            'rota' => 'categorias.listar'
        ]
    ],
    'campos' => [
        'id' => [
            'tipo' => 'text',
            'valor' => isset($_SESSION['dados'][0]['id']) ? $_SESSION['dados'][0]['id'] : ''
        ],
        'nome' => [
            'tipo' => 'text',
            'valor' => isset($_SESSION['dados'][0]['nome']) ? $_SESSION['dados'][0]['nome'] : ''
        ],
        'descricao' => [
            'tipo' => 'textarea',
            'valor' => isset($_SESSION['dados'][0]['descricao']) ? $_SESSION['dados'][0]['descricao'] : ''
        ],
        'rota' => [
            'tipo' => 'text',
            'valor' => $rota
        ]
    ]
]);

echo $htmlFinal
    ?>