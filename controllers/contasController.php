<?php
require_once __DIR__ . '/../inicial/init.php';
require_once $_ENV["PROJECT_ROOT"] . '/models/conta.php';
class contasController
{
    private $conta;

    public function __construct()
    {
        $this->conta = new conta();
    }
    public function listar()
    {
        $dados = $this->conta->listar();
        if ($dados == null) {
            $dados = 'sem dados!';
        }
        $_SESSION["dados"] = $dados;
        return require $_ENV["PROJECT_ROOT"] . "/views/conta/listar_contas.php";

    }

    public function cadastrar($dados = null)
    {
        if ($dados['nome']) {
            $registro = $this->conta->cadastrar($dados);
        }
        $_SESSION['dados'] = $registro;
        return $_ENV["PROJECT_ROOT"] . '/views/conta/cadastrar_contas.php';
    }

    public function search($dados)
    {
        $retorno = $this->conta->search($dados);
        $_SESSION['dados'] = $retorno;

        return $_ENV['PROJECT_ROOT'] . '/views/conta/listar_contas.php';

    }

    public function deletar($dados)
    {
        $this->conta->delete($dados);
        return $_ENV["PROJECT_ROOT"] . "/views/conta/listar_contas.php";
    }
    public function ver($id)
    {
        $return = $this->conta->ver($id);
        $_SESSION['dados'] = $return;
        return $_ENV["PROJECT_ROOT"] . "/views/conta/cadastrar_contas.php";
    }
    public function atualizar($dados)
    {
        file_put_contents($_ENV['PROJECT_ROOT'] . "/saida_log.txt", "\n\n variavel que chegou no atualizar no controller: " . json_encode($dados), FILE_APPEND);

        $return = $this->conta->atualizar($dados);
        $_SESSION['dados'] = $return;

        return $_ENV['PROJECT_ROOT'] . "/views/conta/cadastrar_contas.php";
    }
    public function searchAPI($campo, $valor)
    {
        $retorno = $this->conta->search(['campo' => $campo, 'valor' => $valor]);
        return json_encode($retorno);
    }

    public function listarAPI()
    {
        $retorno = $this->conta->listar();
        return json_encode($retorno);
    }
}
