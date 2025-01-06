<?php
require_once __DIR__ . '/../inicial/init.php';
require_once $_ENV["PROJECT_ROOT"] . '/models/transacao.php';
class transacoesController
{
    private $conta;

    public function __construct()
    {
        $this->conta = new transacao();
    }
    public function listar()
    {
        $dados = $this->conta->listar();
        if ($dados == null) {
            $dados = 'sem dados!';
        }
        $_SESSION["dados"] = $dados;
        return require $_ENV["PROJECT_ROOT"] . "/views/transacao/listar_transacoes.php";

    }

    public function cadastrar($dados = null)
    {

        file_put_contents($_ENV['PROJECT_ROOT'] . "/saida_log.txt", "\n\n variavel que chegou no cadastrar no controller: " . json_encode($dados), FILE_APPEND);

        if ($dados['tipo']) {
            $registro = $this->conta->cadastrar($dados);
        }

        $_SESSION['dados'] = $registro;
        return $_ENV["PROJECT_ROOT"] . '/views/transacao/cadastrar_transacoes.php';
    }

    public function search($dados)
    {
        $retorno = $this->conta->search($dados);
        $_SESSION['dados'] = $retorno;

        return $_ENV['PROJECT_ROOT'] . '/views/transacao/listar_transacoes.php';

    }

    public function deletar($dados)
    {
        $this->conta->delete($dados);
        return $_ENV["PROJECT_ROOT"] . "/views/transacao/listar_transacoes.php";
    }
    public function ver($id)
    {
        $return = $this->conta->ver($id);
        $_SESSION['dados'] = $return;
        return $_ENV["PROJECT_ROOT"] . "/views/transacao/cadastrar_transacoes.php";
    }
    public function atualizar($dados)
    {
        file_put_contents($_ENV['PROJECT_ROOT'] . "/saida_log.txt", "\n\n variavel que chegou no atualizar no controller: " . json_encode($dados), FILE_APPEND);

        $return = $this->conta->atualizar($dados);
        $_SESSION['dados'] = $return;

        return $_ENV['PROJECT_ROOT'] . "/views/transacao/cadastrar_transacoes.php";
    }
    public function searchAPI($campo, $valor)
    {
        file_put_contents($_ENV['PROJECT_ROOT'] . "/saida_log.txt", "\n\n variavel que chegou no search no controller: " . json_encode($campo) . json_encode($valor), FILE_APPEND);

        $retorno = $this->conta->search(["campo" => $campo, "valor" => $valor]);
        return json_encode($retorno);
    }

    public function listarAPI()
    {
        $retorno = $this->conta->listar();
        return json_encode($retorno);
    }
}
