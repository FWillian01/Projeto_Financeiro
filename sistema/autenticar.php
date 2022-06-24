<?php
require_once("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->query("SELECT * from usuarios where email = '$email' and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if($total_reg > 0) {
    // ir para o PAINEL
}else {
    echo "<script>window.alert('Usuario ou Senha Incorretos!')</script>";
    echo "<script>window.location='index.php'</script>";

}


?>