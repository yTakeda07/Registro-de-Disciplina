<?php

include 'conecta.php';

$id = $_POST['id'];



   
    $delete = "DELETE FROM tb_disciplina WHERE CD_DISCIPLINA = '".$id."';";
    $conn->query($delete);

include 'exibiçãoConteudo1.php';

    
     
    ?>