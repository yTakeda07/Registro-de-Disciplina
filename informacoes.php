<?php

include 'conecta.php';

$id = $_POST['id'];



    $exibir = "SELECT NM_DISCIPLINA, CD_DISCIPLINA, QT_CARGA_ANUAL,QT_CARGA_SEMANAL,NR_AVALIACAO, TP_DISCIPLINA from tb_disciplina WHERE CD_DISCIPLINA = ".$id.";";



$stmt = $conn->query($exibir);

if ($stmt->rowCount() > 0) {
    // Fetch and display each row
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
echo "
    <button onclick='voltar(this)' class='back-button'>
        &#8592;
    </button><br>
<h1>".$row["NM_DISCIPLINA"]."</h1>




";
// fim do echo que contem todas as informações da tela.
        


       
    }
// fim do while.
} else {
    echo "Nenhuma materia .";
}

 
?>