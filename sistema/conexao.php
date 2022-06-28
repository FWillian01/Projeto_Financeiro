<?php

$banco = 'melflash';
$usuario = 'root';
$senha = '';
$servidor = 'localhost:3307';


date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8","$usuario","$senha");
} catch (Exception $e) {
    echo 'Não conectado ao Banco de Dados! <br><br>' .$e;
}


// VARIAVEIS DO SISTEMA
$nome_sistema = 'Melf Lash';
$email_sistema = 'contatomelf@gmail.com.br';

?>