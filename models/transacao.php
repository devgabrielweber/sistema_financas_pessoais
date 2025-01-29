<?php
require_once __DIR__ . "/database.php";

class transacao
{
    private $conn;

    public function __construct()
    {
        $this->conn = conecta_banco();
        $this->table = "transacoes";
    }

    public function listar()
    {
        file_put_contents($_ENV['PROJECT_ROOT'] . '/saida_log.txt', 'passou da listagem', FILE_APPEND);

        $query = "SELECT transacoes.id, tipo, valor, beneficiarios.nome as 'Nome Beneficiario', contas.nome as 'Conta', categorias.nome as 'Categoria' FROM " . $_ENV['DB_NAME'] . ".
            transacoes INNER JOIN beneficiarios ON transacoes.id_beneficiario = beneficiarios.id INNER JOIN contas ON transacoes.id_conta = contas.id INNER JOIN categorias ON transacoes.id_categoria = categorias.id ORDER BY transacoes.id DESC";

        file_put_contents($_ENV['PROJECT_ROOT'] . '/saida_log.txt', '\n\n ' . $query, FILE_APPEND);

        $listagem = $this->conn->query($query);

        file_put_contents($_ENV['PROJECT_ROOT'] . '/saida_log.txt', '\n\n ' . json_encode($listagem), FILE_APPEND);

        while ($row = $listagem->fetch_assoc()) {
            $resul_preparado[] = $row;
        }

        return $resul_preparado;
    }

    public function cadastrar($dados)
    {
        try {
            $query = "INSERT INTO transacoes(tipo,valor,id_beneficiario,id_categoria,id_conta,data_liquidacao) VALUES ('" . $dados['tipo'] . "','" . $dados['valor'] . "','" . $dados['beneficiario'] . "','" . $dados['categoria'] . "','" . $dados['conta'] . "','" . $dados['data_liquidacao'] . "');";
            file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n A query é:" . $query, FILE_APPEND);
            $this->conn->query($query);

            $ultimo_id = $this->conn->insert_id;

            $registro = $this->search(['campo' => 'id', 'valor' => $ultimo_id]);
            unset($_POST);
            return $registro;

        } catch (\Throwable $th) {
            $_SESSION['erro'] = $th;
            throw $th;
        }
    }

    public function search($dados)
    {
        try {
            $query = "SELECT * FROM transacoes WHERE " . $dados['campo'] . " LIKE '" . $dados['valor'] . "'";
            file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n A query é:" . $query, FILE_APPEND);
            $return = $this->conn->query($query);
        } catch (\Throwable $th) {
            $_SESSION['erro'] = $th;
            throw $th;
        }

        while ($row = $return->fetch_assoc()) {
            $resul_preparado[] = $row;
        }

        return $resul_preparado;
    }

    public function delete($dados)
    {
        try {
            $query = "DELETE FROM transacoes WHERE id = " . $dados['id'];
            file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n A query é:" . $query, FILE_APPEND);
            $msg = $this->conn->query($query);
        } catch (\Throwable $th) {
            $_SESSION['erro'] = $th;
            throw $th;
        }
    }

    public function ver($dados)
    {
        $query = "SELECT * FROM transacoes WHERE id = " . $dados['id'];

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n a query retornada no model de categorias.ver:" . $query, FILE_APPEND);

        $result = $this->conn->query($query);

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n categorias.ver no controller resutou isso na query:" . json_encode($result), FILE_APPEND);



        while ($row = $result->fetch_assoc()) {
            $resul_preparado[] = $row;
        }

        return $resul_preparado;
    }

    public function atualizar($dados)
    {
        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n o valor de 'dados' em no atualizar em categoria.php é:" . json_encode($dados), FILE_APPEND);

        $query = "UPDATE transacoes SET tipo = '" . $dados['tipo'] . "', valor = '" . $dados['valor'] . "', id_beneficiario = '" . $dados['beneficiario'] . "', id_conta = '" . $dados['conta'] . "', id_categoria = '" . $dados['categoria'] . "', data_liquidacao = '" . $dados['data_liquidacao'] . "' WHERE id = " . $dados['id'];

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n A query é:" . $query, FILE_APPEND);

        $this->conn->query($query);
        unset($_POST);
        $registro = $this->search(['campo' => 'id', 'valor' => $dados['id']]);

        return $registro;

    }
}