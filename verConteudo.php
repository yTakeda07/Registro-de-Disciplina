<?php

include 'conecta.php';
    //inclui a conexao com o banco
$classe = $_POST['id'];
$id = $_POST['class'];
$valor = $_POST['valor']; 
    //define os valores vindo do ajax pela funcao updatesemana


include 'exibiçãoConteudo3.php';
    //inclui o codigo do modal
?>