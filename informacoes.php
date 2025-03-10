<?php

include 'conecta.php';
    //inclui a conexao com o banco
$id = $_POST['id'];
    //seta que $id é igual ao id enviado por ajax na função detalhesclique (que vem do botao ver detalhes)

include 'exibiçãoConteudo2.php';
    //inclui o codigo que carrega a pagina principal com os cards das semanas
 
?>