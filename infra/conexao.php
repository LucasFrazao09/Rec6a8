<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "brinquedos";

$conexao = new mysqli($host, $user, $password, $database);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

?>