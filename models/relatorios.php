<?php
require_once __DIR__ . "/database.php";

class Relatorios
{
    private $conn;
    public function __construct()
    {
        $this->conn = conecta_banco();
    }

    public function filtrar($dados = [], $query)
    {
        $coluna = $query[0];
        $operador = $query[1];
        $valor = $query[2];
    }
}

?>