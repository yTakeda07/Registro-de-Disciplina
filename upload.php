<?php
include 'conecta.php';
    $classe = $_POST["CD_ID_SEMANA"];
    $id = $_POST["CD_DISCIPLINA"];

if ($_FILES['arquivo']['error'] == 0) {
    $nome = $_FILES['arquivo']['name'];
    $caminho = "uploads/" . $nome;
    $CD_ID_SEMANA = $_POST["CD_ID_SEMANA"];
    $CD_DISCIPLINA = $_POST["CD_DISCIPLINA"];

    // Verifica se o diretório "uploads" existe, se não, cria ele
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true); // Cria o diretório com permissões adequadas
    }

    // Tenta mover o arquivo para o diretório "uploads"
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho)) {
        // Alterando para UPDATE e usando query com parâmetros diretos
        $update = "UPDATE semana SET NM_ARQUIVO = '".$nome."', DS_CAMINHO = '".$caminho."' WHERE CD_ID_SEMANA = $CD_ID_SEMANA AND CD_DISCIPLINA = $CD_DISCIPLINA"; // Ajuste o 'WHERE' conforme necessário
        $conn->query($update);

        
        include "exibiçãoConteudo3.php";
        echo "<script>alert('Arquivo atualizado com sucesso!')</script>";
    } else {
        include "exibiçãoConteudo3.php";
        echo "<br><br>Erro ao mover o arquivo para o diretório de uploads.";
    }
} else {
    include "exibiçãoConteudo3.php";
    echo "<br><br>Erro ao enviar arquivo.";
}

?>
