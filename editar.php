<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar cliente | KBM!');

use App\Entity\Cliente;

// VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: listar.php?status=error');
    exit;
}

// CONSULTA O CLIENTE
$obCliente = Cliente::getCliente($_GET['id']);

// VALIDAÇÃO DO CLIENTE
if (!$obCliente instanceof Cliente) {
    header('location: listar.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['nome'],$_POST['nascimento'],$_POST['cpf'],$_POST['rg'],$_POST['telefone'],$_POST['cep'],$_POST['logradouro'],$_POST['numero'],$_POST['bairro'],$_POST['cidade'],$_POST['estado'])) {
    $obCliente->nome           = $_POST['nome'];
    $obCliente->nascimento     = $_POST['nascimento'];
    $obCliente->cpf            = $_POST['cpf'];
    $obCliente->rg             = $_POST['rg'];
    $obCliente->telefone       = $_POST['telefone'];
    $obCliente->cep            = $_POST['cep'];
    $obCliente->logradouro     = $_POST['logradouro'];
    $obCliente->numero         = $_POST['numero'];
    $obCliente->bairro         = $_POST['bairro'];
    $obCliente->cidade         = $_POST['cidade'];
    $obCliente->estado         = $_POST['estado'];
    $obCliente->atualizar();

    header('location: listar.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
