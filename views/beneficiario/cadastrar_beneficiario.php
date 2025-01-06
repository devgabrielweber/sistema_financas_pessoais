<?php
require_once __DIR__ . "/../../inicial/init.php";
require_once $_ENV["PROJECT_ROOT"] . "/controllers/beneficiarioController.php";
?>
<?php
if (isset($_POST['nome'])) {
    //var_dump($_POST);
    $beneficiariosController = new beneficiarioController();
    $dados = $beneficiariosController->cadastrar($_POST);
}

if (isset($_SESSION['dados'][0]['id'])) {
    $rota = 'beneficiarios.atualizar';
} else {
    $rota = 'beneficiarios.cadastrar';
}

// var_dump($_SESSION['dados'][0]);
// var_dump($rota);

?>

<?php
$htmlFinal = $htmlPagina->geraForm([
    'titulo' => 'Cadastrar Beneficiario',
    'botoes' => [
        'salvar' => [
            'tipo' => 'salvar',
            'rota' => 'beneficiarios.cadastrar'
        ],
        'fechar' => [
            'tipo' => 'fechar',
            'rota' => 'beneficiarios.listar'
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
        'contato' => [
            'tipo' => 'text',
            'valor' => isset($_SESSION['dados'][0]['contato']) ? $_SESSION['dados'][0]['contato'] : ''
        ],
        'descricao' => [
            'tipo' => 'text',
            'valor' => isset($_SESSION['dados'][0]['descricao']) ? $_SESSION['dados'][0]['descricao'] : ''
        ],
        'rota' => [
            'tipo' => 'text',
            'valor' => $rota
        ]
    ]
]);

echo $htmlFinal;
?>