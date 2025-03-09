<?php

include 'conecta.php';

$id = $_POST['id'];



   
    $delete = "DELETE FROM tb_disciplina WHERE CD_DISCIPLINA = '".$id."';";
    $delete2 = "DELETE FROM semana WHERE CD_DISCIPLINA = '".$id."';";
    $conn->query($delete);
    $conn->query($delete2);

include 'exibiçãoConteudo1.php';

    
     
    ?>