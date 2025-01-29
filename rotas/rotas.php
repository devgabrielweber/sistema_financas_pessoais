<?php
require_once __DIR__ . '/../inicial/init.php';

$redirecionadorController->set_rotas('cliente.listar', 'clienteController@listar');



//################################

$redirecionadorController->set_rotas('contas.search', 'contasController@search');

$redirecionadorController->set_rotas('contas.listar', 'contasController@listar');

$redirecionadorController->set_rotas('contas.cadastrar', 'contasController@cadastrar');

$redirecionadorController->set_rotas('contas.ver', 'contasController@ver');

$redirecionadorController->set_rotas('contas.atualizar', 'contasController@atualizar');

$redirecionadorController->set_rotas('contas.deletar', 'contasController@deletar');


$redirecionadorController->set_rotas('beneficiarios.search', 'beneficiarioController@search');

$redirecionadorController->set_rotas('beneficiarios.listar', 'beneficiarioController@listar');

$redirecionadorController->set_rotas('beneficiarios.deletar', 'beneficiarioController@deletar');

$redirecionadorController->set_rotas('beneficiarios.atualizar', 'beneficiarioController@atualizar');

$redirecionadorController->set_rotas('beneficiarios.ver', 'beneficiarioController@ver');

$redirecionadorController->set_rotas('beneficiarios.cadastrar', 'beneficiarioController@cadastrar');



$redirecionadorController->set_rotas('categorias.search', 'categoriasController@search');

$redirecionadorController->set_rotas('categorias.listar', 'categoriasController@listar');

$redirecionadorController->set_rotas('categorias.cadastrar', 'categoriasController@cadastrar');

$redirecionadorController->set_rotas('categorias.ver', 'categoriasController@ver');

$redirecionadorController->set_rotas('categorias.atualizar', 'categoriasController@atualizar');

$redirecionadorController->set_rotas('categorias.deletar', 'categoriasController@deletar');



$redirecionadorController->set_rotas('transacoes.search', 'transacoesController@search');

$redirecionadorController->set_rotas('transacoes.listar', 'transacoesController@listar');

$redirecionadorController->set_rotas('transacoes.cadastrar', 'transacoesController@cadastrar');

$redirecionadorController->set_rotas('transacoes.ver', 'transacoesController@ver');

$redirecionadorController->set_rotas('transacoes.atualizar', 'transacoesController@atualizar');

$redirecionadorController->set_rotas('transacoes.deletar', 'transacoesController@deletar');