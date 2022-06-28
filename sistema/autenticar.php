<?php
// session_start();
require_once("conexao.php");

$email = $_POST['email'];
$senha = $_POST['password'];

$query = $pdo->query("SELECT * from usuarios where email = '$email' and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
    if($total_reg > 0){
         // ir para o PAINEL
        echo "<script>window.location='painel'</script>";
    }else {
        echo "<script>window.alert('Seu usuario foi desativado, contate o administrador!')</script>";
        echo "<script>window.location='index.php'</script>";
    }


?>