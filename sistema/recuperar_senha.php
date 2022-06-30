<?php

require_once("conexao.php");

$email = $_POST['email'];


$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0){

}else {
    echo 'Esse email não está Cadastrado';
}


?>