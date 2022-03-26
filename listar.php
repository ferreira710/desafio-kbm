<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Dashboard | KBM!');

use App\Entity\Cliente;

$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$condicoes = [
  strlen($busca) ? 'cpf LIKE "%' .str_replace('', '%', $busca). '%"' : null
];

$where = implode(' AND ', $condicoes);

$clientes = Cliente::getClientes($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
