<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Dashboard | KBM!');

use App\Entity\Cliente;

$clientes = Cliente::getClientes();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
