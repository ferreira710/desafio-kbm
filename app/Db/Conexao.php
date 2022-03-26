<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'ferro';
$dbName = 'db';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conexao === false) {
    die("ERROR: Não foi possível conectar ao banco de dados. " . mysqli_connect_error());
}
