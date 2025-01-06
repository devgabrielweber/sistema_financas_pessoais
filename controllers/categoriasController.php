<?php
require_once __DIR__ . '/../inicial/init.php';
require_once $_ENV["PROJECT_ROOT"] . '/models/categoria.php';
class categoriasController
{
    private $categoria;

    public function __construct()
    {
        $this->categoria = new categoria();
    }
    public function listar()
    {
        $dados = $this->categoria->listar();
        if ($dados == null) {
            $dados = 'sem dados!';
        }
        $_SESSION["dados"] = $dados;
        return require $_ENV["PROJECT_ROOT"] . "/views/categoria/listar_categorias.php";

    }

    public function cadastrar($dados = null)
    {
        if ($dados['nome']) {
            $registro = $this->categoria->cadastrar($dados);
        }
        $_SESSION['dados'] = $registro;
        return $_ENV["PROJECT_ROOT"] . '/views/categoria/cadastrar_categorias.php';
    }

    public function search($dados)
    {
        $retorno = $this->categoria->search($dados);
        $_SESSION['dados'] = $retorno;

        return $_ENV['PROJECT_ROOT'] . '/views/categoria/listar_categorias.php';

    }

    public function deletar($dados)
    {
        $this->categoria->delete($dados);
        return $_ENV["PROJECT_ROOT"] . "/views/categoria/listar_categorias.php";
    }
    public function ver($id)
    {
        $return = $this->categoria->ver($id);
        $_SESSION['dados'] = $return;
        return $_ENV["PROJECT_ROOT"] . "/views/categoria/cadastrar_categorias.php";
    }
    public function atualizar($dados)
    {
        file_put_contents($_ENV['PROJECT_ROOT'] . "/saida_log.txt", "\n\n variavel que chegou no atualizar no controller: " . json_encode($dados), FILE_APPEND);

        $return = $this->categoria->atualizar($dados);
        $_SESSION['dados'] = $return;

        return $_ENV['PROJECT_ROOT'] . "/views/categoria/cadastrar_categorias.php";
    }
    public function listarAPI()
    {
        $retorno = $this->categoria->listar();
        return json_encode($retorno);
    }

    public function searchAPI($campo, $valor)
    {
        $retorno = $this->categoria->search(["campo" => $campo, "valor" => $valor]);
        return json_encode($retorno);
    }
}
