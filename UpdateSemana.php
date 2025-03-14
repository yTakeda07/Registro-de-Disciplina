<?php

include 'conecta.php';
    //inclui a conexao com o banco
$classe = $_POST['id'];
$id = $_POST['class'];
$valor = $_POST['valor']; 
    //define os valores vindo do ajax pela funcao updatesemana


$update = "UPDATE semana
SET DS_SEMANA = '".$valor."'
WHERE CD_ID_SEMANA = ".$classe." AND CD_DISCIPLINA = ".$id." ;";
    //codigo sql para atualizar a descrição da aula 

$conn->query($update); 
    //executa o codigo sql
echo "<script>alert('Conteudo atualizado')</script>";
include 'exibiçãoConteudo2.php';
    //inclui o codigo para exibir os cards das

?>