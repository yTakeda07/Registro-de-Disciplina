<?php

include 'conecta.php';
    //inclui o codigo da conexão com o banco

$id = $_POST['id'];
    //define que $id é igual ao id enviado pelo ajax na funcão apagarMateria

    $delete = "DELETE FROM tb_disciplina WHERE CD_DISCIPLINA = '".$id."';";
    $delete2 = "DELETE FROM semana WHERE CD_DISCIPLINA = '".$id."';";
        //comandos sql que apagam as tabelas no banco que correspondem à o botao X clicado

    $conn->query($delete);
    $conn->query($delete2);
        //executa os comandos sql

include 'exibiçãoConteudo1.php';
        //inclui o codigo que carrega a pagina principal com os cards das disciplinas
    
     
    ?>