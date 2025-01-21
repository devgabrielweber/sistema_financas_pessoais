<sript src="/inicial/init.js"></sript>

<?php
require '../inicial/init.php';
require '../controllers/contasController.php';

$contasController = new contasController();

if (isset($_POST['campo']) && isset($_POST['valor'])) {
    $pagina = $contasController->search(['campo' => $_POST['campo'], 'valor' => $_POST['valor']]);
    //echo 'post está setado';
    require $pagina;
    die();
} else {
    echo "post não está setado";
    $pagina = [];
}
?>
<html>
<form method="POST" action="/views/search_contas.php">
    <label for="campo">Campo: </label>
    <select name="campo">
        <option value="id">ID</option>
    </select>
    <label for="valor">Valor: </label>
    <input type="text" name="valor">
    <button type="submit">Enviar</button>
</form>

</html>