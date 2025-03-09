<?php

include 'conecta.php';

$NM_DISCIPLINA = $_POST['nm_disciplina'];
$QT_CARGA_ANUAL = $_POST['qt_carga_anual'];
$QT_CARGA_SEMANAL = $_POST['qt_carga_semanal'];
$NM_AVALIACAO = $_POST['nm_avaliacao'];
$TP_DISCIPLINA = $_POST['tp_disciplina'];

if ($TP_DISCIPLINA == "Anual") {
    $NR_SEMANAS = 40;
    $NR_SEMANAS_AVALIATIVAS = $NM_AVALIACAO * 4;
    $NR_SEMANAS_RECUPERACOES = $NR_SEMANAS_AVALIATIVAS;
    $NR_SEMANAS_FERIADOS = 9;
    $NR_SEMANAS_LETIVAS = $NR_SEMANAS - $NR_SEMANAS_FERIADOS - $NR_SEMANAS_AVALIATIVAS - $NR_SEMANAS_RECUPERACOES;

} else {
    $NR_SEMANAS = 20;
    $NR_SEMANAS_AVALIATIVAS = $NM_AVALIACAO * 2;
    $NR_SEMANAS_RECUPERACOES = $NR_SEMANAS_AVALIATIVAS;
    $NR_SEMANAS_FERIADOS = 4;
    $NR_SEMANAS_LETIVAS = $NR_SEMANAS - $NR_SEMANAS_FERIADOS - $NR_SEMANAS_AVALIATIVAS - $NR_SEMANAS_RECUPERACOES;
}


$inserir = "INSERT INTO TB_DISCIPLINA (NM_DISCIPLINA, QT_CARGA_ANUAL, QT_CARGA_SEMANAL, NR_AVALIACAO, TP_DISCIPLINA)
            VALUES ('$NM_DISCIPLINA', '$QT_CARGA_ANUAL', '$QT_CARGA_SEMANAL', '$NM_AVALIACAO', '$TP_DISCIPLINA')";

$conn->query($inserir);

// Recupera o ID da disciplina inserida (copiado do gpt)
$CD_DISCIPLINA = $conn->lastInsertId();  // ✅ Obtém o ID gerado

for($i=1; $i<=$NR_SEMANAS_LETIVAS; $i++){
    

    $TP_SEMANA_INSERIDO = "LETIVA";
    $inserir2 = "INSERT INTO semana (CD_DISCIPLINA, TP_SEMANA, NM_DISCIPLINA)
            VALUES ('$CD_DISCIPLINA', '$TP_SEMANA_INSERIDO', '$NM_DISCIPLINA')";
    $conn->query($inserir2);
}

for($i=1; $i<=$NR_SEMANAS_AVALIATIVAS; $i++){
    

    $TP_SEMANA_INSERIDO = "AVALIATIVAS" ;
    $inserir2 = "INSERT INTO semana (CD_DISCIPLINA, TP_SEMANA, NM_DISCIPLINA)
            VALUES ('$CD_DISCIPLINA', '$TP_SEMANA_INSERIDO', '$NM_DISCIPLINA')";
    $conn->query($inserir2);
}

for($i=1; $i<=$NR_SEMANAS_RECUPERACOES; $i++){
    

    $TP_SEMANA_INSERIDO = "RECUPERAÇÃO";
    $inserir2 = "INSERT INTO semana (CD_DISCIPLINA, TP_SEMANA, NM_DISCIPLINA)
            VALUES ('$CD_DISCIPLINA', '$TP_SEMANA_INSERIDO', '$NM_DISCIPLINA')";
    $conn->query($inserir2);
}

for($i=1; $i<=$NR_SEMANAS_FERIADOS; $i++){
    

    $TP_SEMANA_INSERIDO = "FERIADO";
    $inserir2 = "INSERT INTO semana (CD_DISCIPLINA, TP_SEMANA, NM_DISCIPLINA)
            VALUES ('$CD_DISCIPLINA', '$TP_SEMANA_INSERIDO', '$NM_DISCIPLINA')";
    $conn->query($inserir2);
}

echo "<br><br>Disciplina registrada com sucesso";

?>