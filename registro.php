<?php

include 'conecta.php';
    //inclui a conexao com o banco de dados

$NM_DISCIPLINA = $_POST['nm_disciplina'];
$QT_CARGA_ANUAL = $_POST['qt_carga_anual'];
$QT_CARGA_SEMANAL = $_POST['qt_carga_semanal'];
$NM_AVALIACAO = $_POST['nm_avaliacao'];
$TP_DISCIPLINA = $_POST['tp_disciplina'];
    //seta as variaveis vindo do ajax pela função clicado pra registro dos dados

$NR_SEMANAS = ($TP_DISCIPLINA == "Anual") ? 40 : 20; //se for anual, 40 senao 20
$NR_SEMANAS_AVALIATIVAS = $NM_AVALIACAO * (($TP_DISCIPLINA == "Anual") ? 4 : 2); //faz o numero de avaliações * 4 se for anual, ou 2 se for semestral
$NR_SEMANAS_RECUPERACOES = $NR_SEMANAS_AVALIATIVAS; //auto explicativo né? kk
$NR_SEMANAS_FERIADOS = ($TP_DISCIPLINA == "Anual") ? 9 : 4; // seta que os feriados são 9 se for anual, e 4 se for semestral
$NR_SEMANAS_LETIVAS = $NR_SEMANAS - $NR_SEMANAS_FERIADOS - $NR_SEMANAS_AVALIATIVAS - $NR_SEMANAS_RECUPERACOES; //calcula a quantidade de semanas letivas

$inserir = "INSERT INTO TB_DISCIPLINA (NM_DISCIPLINA, QT_CARGA_ANUAL, QT_CARGA_SEMANAL, NR_AVALIACAO, TP_DISCIPLINA)
            VALUES ('$NM_DISCIPLINA', '$QT_CARGA_ANUAL', '$QT_CARGA_SEMANAL', '$NM_AVALIACAO', '$TP_DISCIPLINA')";
    //comando slq pra insersão de dados no banco


$conn->query($inserir); //realiza a insersao
$CD_DISCIPLINA = $conn->lastInsertId();  // Obtém o ID gerado

// Estrutura otimizada para inserção das semanas usando array
$semanas = [
    "LETIVA" => $NR_SEMANAS_LETIVAS,
    "AVALIATIVA" => $NR_SEMANAS_AVALIATIVAS,
    "RECUPERAÇÃO" => $NR_SEMANAS_RECUPERACOES,
    "FERIADO" => $NR_SEMANAS_FERIADOS
];

$cd_id_semana = 1; // Inicia a contagem de CD_ID_SEMANA

foreach ($semanas as $tipo => $quantidade) {
    if ($quantidade > 0) {
        for ($i = 0; $i < $quantidade; $i++) {
            // Aqui você insere o valor para CD_ID_SEMANA
            $inserir2 = "INSERT INTO semana (CD_DISCIPLINA, CD_ID_SEMANA, TP_SEMANA, NM_DISCIPLINA) 
                         VALUES ('$CD_DISCIPLINA', '$cd_id_semana', '$tipo', '$NM_DISCIPLINA')";
            $conn->query($inserir2);

            // Incrementa CD_ID_SEMANA para a próxima semana
            $cd_id_semana++;
        }
    }
}

echo "<br><br>Disciplina registrada com sucesso";

?>
