<?php
require_once __DIR__ . '/../inicial/init.php';
require_once $_ENV["PROJECT_ROOT"] . '/models/beneficiario.php';
class beneficiarioController
{
    private $beneficiario;

    public function __construct()
    {
        $this->beneficiario = new beneficiario();
    }
    public function listar()
    {
        $dados = $this->beneficiario->listar();
        if ($dados == null) {
            $dados = 'sem dados!';
        }
        $_SESSION["dados"] = $dados;
        return require $_ENV["PROJECT_ROOT"] . "/views/beneficiario/listar_beneficiarios.php";

    }

    public function cadastrar($dados = null)
    {
        if ($dados['nome']) {
            $registro = $this->beneficiario->cadastrar($dados);
        }
        $_SESSION['dados'] = $registro;
        return $_ENV["PROJECT_ROOT"] . '/views/beneficiario/cadastrar_beneficiario.php';
    }

    public function search($dados)
    {
        $retorno = $this->beneficiario->search($dados);
        $_SESSION['dados'] = $retorno;

        return $_ENV['PROJECT_ROOT'] . '/views/beneficiario/listar_beneficiarios.php';

    }

    public function deletar($dados)
    {
        $this->beneficiario->delete($dados);
        return $_ENV["PROJECT_ROOT"] . "/views/beneficiario/listar_beneficiarios.php";
    }
    public function ver($id)
    {
        $return = $this->beneficiario->ver($id);
        $_SESSION['dados'] = $return;
        return $_ENV["PROJECT_ROOT"] . "/views/beneficiario/cadastrar_beneficiario.php";
    }
    public function atualizar($dados)
    {
        file_put_contents($_ENV['PROJECT_ROOT'] . "/saida_log.txt", "\n\n variavel que chegou no atualizar no controller: " . json_encode($dados), FILE_APPEND);

        $return = $this->beneficiario->atualizar($dados);
        $_SESSION['dados'] = $return;

        return $_ENV['PROJECT_ROOT'] . "/views/beneficiario/cadastrar_beneficiario.php";
    }
    public function searchAPI($campo, $valor)
    {
        $retorno = $this->beneficiario->search(['campo' => $campo, 'valor' => $valor]);
        return json_encode($retorno);
    }

    public function listarAPI()
    {
        $retorno = $this->beneficiario->listar();
        return json_encode($retorno);
    }
}
