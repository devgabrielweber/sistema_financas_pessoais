<?php
require_once(__DIR__ . "/../inicial/init.php");

function conecta_banco()
{
    $host = $_ENV['DB_SERVER'];
    $usr = "root";
    $psswd = $_ENV['DB_PSSWD'];

    file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\n\ntentou conectar com o banco", FILE_APPEND);

    try {
        $conn = new mysqli($host, $usr, $psswd, $_ENV['DB_NAME']);
        mysqli_set_charset($conn, 'utf8mb4');
    } catch (mysqli_sql_exception $e) {

        file_put_contents($_ENV["PROJECT_ROOT"] . "/saida_log.txt", "\nerro ao conectar com o banco", FILE_APPEND);
        die("Erro na conexão: " . $e->getMessage());
    }

    return $conn;
}
