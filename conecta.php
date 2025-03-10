<?php


$username = "root";
$password = "";
$conexao = 'mysql:host=localhost;port=3306;dbname=bancodisciplina';
    //variaveis que serão usada no PDO
try {
    //tenta:
$conn = new PDO($conexao,$username, $password);
    //faz a coneção com o banco e armazena no conn
} catch(PDOException $e){ //se der errado
    echo "ERROR: ".$e->getMessage();
}       //escreve o erro caso haja (nunca deu ate hj comigo kk)

?>