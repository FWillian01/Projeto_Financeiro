<?php
@session_start();
echo $_SESSION['nivel'];
require_once("../conexao.php");
require_once("verificar.php");



?>


<a href="logout.php">SAIR</a>
