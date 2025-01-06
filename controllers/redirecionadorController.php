<?php
require_once __DIR__ . "../../inicial/init.php";
require_once $_ENV["PROJECT_ROOT"] . "/models/redirecionador.php";
class RedirecionadorController
{
    private $rotas = [];
    private $redirecionador;

    public function __construct()
    {
        $this->redirecionador = new Redirecionador();
    }

    public function set_rotas($nome, $controller_metodo)
    {
        $this->redirecionador->set_rota($nome, $controller_metodo);

    }

    public function redirecionar($nome_rota, $dados = null, $tipo_conexao = "view")
    {
        //######################### DEBUG #####################################
        file_put_contents($_ENV["PROJECT_ROOT"] . '/saida_rotas.txt', "\n\nredirecionadorController -> redirecionar() chamado! As rotas salvas são: " . json_encode($this->redirecionador->get_rotas()), FILE_APPEND);
        file_put_contents($_ENV["PROJECT_ROOT"] . '/saida_log.txt', "\n\n\nchegou no redirecionadorController rota redirecionar", FILE_APPEND, );
        //######################### DEBUG #####################################

        //se a rota existir:
        if (isset($this->redirecionador->get_rotas()[$nome_rota])) {
            //debug
            file_put_contents($_ENV["PROJECT_ROOT"] . '/saida_log.txt', "\nAchou a rota", FILE_APPEND, );
            //debug

            //verifica se é api, se for, echo o retorno
            switch ($tipo_conexao) {
                case 'api':
                    $retorno = $this->redirecionador->redirecionar($nome_rota, $dados);
                    echo json_encode($retorno);
                    break;
                default:
                    $retorno = $this->redirecionador->redirecionar($nome_rota, $dados);
                    return $retorno;
            }

        } else {
            //debug
            file_put_contents($_ENV["PROJECT_ROOT"] . '/saida_log.txt', "\nnão achou a rota", FILE_APPEND, );
            //debug
            $_SESSION["erro"] = "Tentando redirecionar para rota inexistente: " . $nome_rota;
        }
    }

}
?>