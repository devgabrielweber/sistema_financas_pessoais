<script src="/inicial/init.js"></script>
<?php
require_once __DIR__ . "/../../inicial/init.php";
require_once $_ENV["PROJECT_ROOT"] . "/controllers/contasController.php";
?>
<?php
if (isset($_POST['nome'])) {
    //var_dump($_POST);
    $contasController = new contasController();
    $dados = $contasController->cadastrar($_POST);
}

if (isset($_SESSION['dados'][0]['id'])) {
    $rota = 'contas.atualizar';
} else {
    $rota = 'contas.cadastrar';
}

// var_dump($_SESSION['dados'][0]);
// var_dump($rota);


$htmlFinal = $htmlPagina->geraForm([
    'titulo' => 'Cadastrar Contas',
    'botoes' => [
        'salvar' => [
            'tipo' => 'salvar',
            'rota' => 'contas.cadastrar'
        ],
        'fechar' => [
            'tipo' => 'fechar',
            'rota' => 'contas.listar'
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
        'saldo' => [
            'tipo' => 'text',
            'valor' => isset($_SESSION['dados'][0]['saldo']) ? $_SESSION['dados'][0]['saldo'] : ''
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