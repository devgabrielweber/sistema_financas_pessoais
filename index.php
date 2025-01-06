<script src="/inicial/init.js"></script>
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: text/html, charset=UTF-8");

define('ROOT_PROJETO', __DIR__);
require_once ROOT_PROJETO . "/inicial/init.php";

if (isset($_SESSION['erro'])) {
    echo $_SESSION['erro'];
}

if (isset($_POST['rota'])) {
    file_put_contents('./saida_log.txt', "\n\n" . $_POST['rota'], FILE_APPEND);
    file_put_contents('./saida_log.txt', "\n\n post[dados]:" . $_POST['dados'], FILE_APPEND);

    require $redirecionadorController->redirecionar($_POST['rota'], isset($_POST) ? $_POST : 0, 'view');
    die();
} else {
    require $redirecionadorController->redirecionar('contas.listar');
}