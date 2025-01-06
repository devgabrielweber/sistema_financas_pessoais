<?php
require_once __DIR__ . "/database.php";

class conta
{
    private $conn;

    public function __construct()
    {
        $this->conn = conecta_banco();
        $this->table = "Contas";
    }

    public function listar()
    {
        $listagem = $this->conn->query("SELECT * FROM " . $_ENV['DB_NAME'] . ".
        contas ORDER BY id");

        while ($row = $listagem->fetch_assoc()) {
            $resul_preparado[] = $row;
        }

        return $resul_preparado;
    }

    public function cadastrar($dados)
    {
        try {
            $query = "INSERT INTO contas(nome,saldo,descricao) VALUES ('" . $dados['nome'] . "'," . $dados['saldo'] . ",'" . $dados['descricao'] . "');";
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
            $query = "SELECT * FROM contas WHERE " . $dados['campo'] . " LIKE " . $dados['valor'];
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
            $query = "DELETE FROM contas WHERE id = " . $dados['id'];
            file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n A query é:" . $query, FILE_APPEND);
            $msg = $this->conn->query($query);
        } catch (\Throwable $th) {
            $_SESSION['erro'] = $th;
            throw $th;
        }
    }

    public function ver($dados)
    {
        $query = "SELECT * FROM contas WHERE id = " . $dados['id'];
        $result = $this->conn->query($query);

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n a query retornada no model de contas.ver:" . $query, FILE_APPEND);

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n contas.ver no controller resutou isso na query:" . json_encode($result), FILE_APPEND);



        while ($row = $result->fetch_assoc()) {
            $resul_preparado[] = $row;
        }

        return $resul_preparado;
    }

    public function atualizar($dados)
    {
        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n o valor de 'dados' em no atualizar em conta.php é:" . json_encode($dados), FILE_APPEND);

        $query = "UPDATE contas SET nome = '" . $dados['nome'] . "', saldo = " . $dados['saldo'] . ", descricao = '" . $dados['descricao'] . "' WHERE id = " . $dados['id'];

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n A query é:" . $query, FILE_APPEND);

        $this->conn->query($query);
        unset($_POST);
        $registro = $this->search(['campo' => 'id', 'valor' => $dados['id']]);

        return $registro;

    }
}