<?php

include 'conecta.php';

$id = $_POST['id'];


    // $inserir = "INSERT into produto values(null,'".$nome."');";
    $exibir = "SELECT NM_DISCIPLINA, CD_DISCIPLINA, QT_CARGA_ANUAL,QT_CARGA_SEMANAL,NR_AVALIACAO, TP_DISCIPLINA from tb_disciplina;";
    $delete = "DELETE FROM tb_disciplina WHERE CD_DISCIPLINA = '".$id."';";
    $conn->query($delete);

    
    $stmt = $conn->query($exibir);

    if ($stmt->rowCount() > 0) {
        // Fetch and display each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <div class='card'>
                <div class='info'>
                 <button class='close-button' onclick='apagarMateria(this)' id='".$row['CD_DISCIPLINA']."'>✖</button>
                  <p>Codigo: " . $row['CD_DISCIPLINA'] . "</p>
                  <p>Nome: " . $row['NM_DISCIPLINA'] . "</p>
                  <p>Carga Anual: " . $row['QT_CARGA_ANUAL'] . "</p>
                  <p>Carga Semanal: " . $row['QT_CARGA_SEMANAL'] . "</p>
                  <p>Avaliações por Bimestre: " . $row['NR_AVALIACAO'] . "</p>
                  <p>Periodo: " . $row['TP_DISCIPLINA'] . "</p>
                </div>
                <button class='details-button' id='".$row['CD_DISCIPLINA']."'>Ver Detalhes</button>
              </div>
    
    
    ";
            
    
    
           
        }
        
    } else {
        echo "Nenhuma materia .";
    }
    
     
    ?>