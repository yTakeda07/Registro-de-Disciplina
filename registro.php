<?php

include 'conecta.php';

$NM_DISCIPLINA = $_POST['nm_disciplina'];
$QT_CARGA_ANUAL = $_POST['qt_carga_anual'];
$QT_CARGA_SEMANAL = $_POST['qt_carga_semanal'];
$NM_AVALIACAO = $_POST['nm_avaliacao'];
$TP_DISCIPLINA = $_POST['tp_disciplina'];


$inserir = "INSERT INTO TB_DISCIPLINA (NM_DISCIPLINA, QT_CARGA_ANUAL, QT_CARGA_SEMANAL, NR_AVALIACAO, TP_DISCIPLINA)
            VALUES ('$NM_DISCIPLINA', '$QT_CARGA_ANUAL', '$QT_CARGA_SEMANAL', '$NM_AVALIACAO', '$TP_DISCIPLINA')";



$conn->query($inserir);
  

echo "tabela registrada com sucesso";
 
?>