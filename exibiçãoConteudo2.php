<?php



$exibir1 = "SELECT NM_DISCIPLINA, CD_DISCIPLINA, QT_CARGA_ANUAL, QT_CARGA_SEMANAL, NR_AVALIACAO, TP_DISCIPLINA from tb_disciplina WHERE CD_DISCIPLINA = ".$id.";";
$exibir2 = "SELECT CD_ID_SEMANA, CD_SEMANA, CD_DISCIPLINA, DS_SEMANA, NM_DISCIPLINA, TP_SEMANA from semana WHERE CD_DISCIPLINA = ".$id.";";
    //comandos sql para exibir os dados das tabelas


// Executando a consulta para obter os dados da disciplina
$stmt = $conn->query($exibir1);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Exibe os dados da disciplina
if ($row) {
    echo "
    <button onclick='voltar(this)' class='back-button'>
        &#8592;
    </button><br>
    <h1>".$row["NM_DISCIPLINA"]."</h1>
    <div class='tipos'>
    <h3>Tipos de Semana:</h3>
    <p class='LETIVA'>letiva</p>
    <p class='AVALIATIVA'>avaliativa</p>
    <p class='RECUPERAÇÃO'>recuperação</p>
    <p class='FERIADO'>feriado</p>
    </div>
    <div class='card-container'>
    
    <br>
    ";

    // Executando a consulta para obter os dados das semanas
    $stmt2 = $conn->query($exibir2);
    
    // Exibindo os dados de cada semana
    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div class='card2 ".$row2["TP_SEMANA"]."'>
        CD SEMANA: ".$row2["CD_ID_SEMANA"]."

         <button onclick='verconteudo(this)' class='".$row["CD_DISCIPLINA"]."' id='".$row2["CD_ID_SEMANA"]."'>Ver Conteudo</button>
        </div>
        
        ";
    }
    
    echo "</div>"; // Finaliza o container dos cards
}

?>
