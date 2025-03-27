<?php
include 'conecta.php';

$CD_ID_SEMANA = $_GET['CD_ID_SEMANA'];
$CD_DISCIPLINA = $_GET['CD_DISCIPLINA'];

// Prepara a consulta
$stmt = $conn->prepare("SELECT DS_CAMINHO FROM semana WHERE CD_ID_SEMANA = :id AND CD_DISCIPLINA = :disciplina");
$stmt->bindParam(':id', $CD_ID_SEMANA);
$stmt->bindParam(':disciplina', $CD_DISCIPLINA);
$stmt->execute();

// Pega o resultado
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $caminho = $row['DS_CAMINHO'];

    if (file_exists($caminho)) {
        // Força o download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($caminho).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($caminho));
        readfile($caminho);
        exit;
    } else {
        echo "Arquivo não encontrado no servidor: $caminho";
    }
} else {
    echo "Informações não encontradas no banco.";
}
?>
