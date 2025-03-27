<?php
include 'conecta.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM semana WHERE id = ?");
$stmt->execute([$id]);
$file = $stmt->fetch(PDO::FETCH_ASSOC);

if ($file) {
    header("Content-Type: " . $file['tipo_arquivo']);
    header("Content-Disposition: attachment; filename=\"" . $file['nome_arquivo'] . "\"");
    echo $file['dados'];
}
?>