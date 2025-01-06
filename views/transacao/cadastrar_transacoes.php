<script src="/inicial/init.js"></script>
<?php
require_once __DIR__ . "/../../inicial/init.php";
require_once $_ENV['PROJECT_ROOT'] . "/controllers/categoriasController.php";
require_once $_ENV['PROJECT_ROOT'] . "/controllers/beneficiarioController.php";
require_once $_ENV['PROJECT_ROOT'] . "/controllers/contasController.php";
require_once $_ENV['PROJECT_ROOT'] . "/controllers/transacoesController.php";

$categoriasController = new categoriasController();
$beneficiariosController = new beneficiarioController();
$contasController = new contasController();

$categoriasSelect = json_decode($categoriasController->listarAPI());
$categoriasSelectPreparado = [];
foreach ($categoriasSelect as $linha) {
    $categoriasSelectPreparado[$linha->nome] = [
        'id' => $linha->id,
        'selecionado' => isset($_SESSION['dados'][0]['id_categoria']) ? $_SESSION['dados'][0]['id_categoria'] == $linha->id ? true : false : false
    ];
}

$beneficiariosSelect = json_decode($beneficiariosController->listarAPI());
$beneficiariosSelectPreparado = [];
foreach ($beneficiariosSelect as $linha) {
    $beneficiariosSelectPreparado[$linha->nome] = [
        'id' => $linha->id,
        'selecionado' => isset($_SESSION['dados'][0]['id_beneficiario']) ? $_SESSION['dados'][0]['id_beneficiario'] == $linha->id ? true : false : false
    ];
}

$contasSelect = json_decode($contasController->listarAPI());
$contasSelectPreparado = [];
foreach ($contasSelect as $linha) {
    $contasSelectPreparado[$linha->nome] = [
        'id' => $linha->id,
        'selecionado' => isset($_SESSION['dados'][0]['id_conta']) ? $_SESSION['dados'][0]['id_conta'] == $linha->id ? true : false : false
    ];
}


if (isset($_POST['tipo'])) {
    $transacoesController = new transacoesController();
    $dados = $transacoesController->cadastrar($_POST);
}


if (isset($_SESSION['dados'][0]['id'])) {
    $rota = 'transacoes.atualizar';
} else {
    $rota = 'transacoes.cadastrar';
}

//var_dump($categoriasSelectPreparado);
// if (isset($_SESSION['dados'])) {
//     var_dump(json_decode($categoriasController->searchAPI('id', $_SESSION['dados'][0]['id_categoria'])));
// }

$htmlFinal = $htmlPagina->geraForm(
    [
        'titulo' => 'Cadastrar Transacao',
        'botoes' => [
            'salvar' => [
                'tipo' => 'salvar',
                'rota' => 'transacoes.cadastrar'
            ],
            'fechar' => [
                'tipo' => 'fechar',
                'rota' => 'transacoes.listar'
            ]
        ],
        'campos' => [
            'id' => [
                'tipo' => 'text',
                'valor' => isset($_SESSION['dados'][0]['id']) ? $_SESSION['dados'][0]['id'] : ''
            ],
            'tipo' => [
                'tipo' => 'text',
                'valor' => isset($_SESSION['dados'][0]['tipo']) ? $_SESSION['dados'][0]['tipo'] : ''
            ],
            'valor' => [
                'tipo' => 'number',
                'valor' => isset($_SESSION['dados'][0]['valor']) ? $_SESSION['dados'][0]['valor'] : ''
            ],
            'categoria' => [
                'tipo' => 'select',
                'opcoes' => $categoriasSelectPreparado
            ],
            'beneficiario' => [
                'tipo' => 'select',
                'opcoes' => $beneficiariosSelectPreparado
            ],
            'conta' => [
                'tipo' => 'select',
                'opcoes' => $contasSelectPreparado
            ],
            'data liquidacao' => [
                'tipo' => 'date',
                'valor' => isset($_SESSION['dados'][0]['data_liquidacao']) ? $_SESSION['dados'][0]['data_liquidacao'] : '',
                'nome_input' => 'data_liquidacao'
            ],
            'rota' => [
                'tipo' => 'text',
                'valor' => $rota
            ]
        ],

    ]
);
echo $htmlFinal;

//var_dump(json_decode($categoriasController->listarAPI()));
?>