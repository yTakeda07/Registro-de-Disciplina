<?php



$exibir1 = "SELECT * FROM semana WHERE CD_DISCIPLINA = ".$id." AND CD_ID_SEMANA =".$classe.";";
$exibir2 = "SELECT * from tb_disciplina WHERE CD_DISCIPLINA = ".$id.";";

$stmt1 = $conn->query($exibir1); 

    //executa o codigo sql
$row = $stmt1->fetch(PDO::FETCH_ASSOC);
$stmt2 = $conn->query($exibir2);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if ($row) {
   
    echo "
<div>Conteudo semana:".$row["CD_ID_SEMANA"]."</div>
<button class='close-button' onclick='closemodal(this)'>✖</button>

    ";

    // Executando a consulta para obter os dados das semanas


    
    // Exibindo os dados de cada semana
    if($row2){
        echo "


    <input type='file' id='arquivo' name='arquivo' required>
    <button onclick='uploadArquivo(this)' class='".$row["CD_ID_SEMANA"]." ".$row["CD_DISCIPLINA"]."' >Enviar</button>
<br><br>
        <label>Arquivo da semana:</label> 
        <a href='baixar.php?CD_ID_SEMANA=".$row["CD_ID_SEMANA"]."&CD_DISCIPLINA=".$row["CD_DISCIPLINA"]."'>".$row["NM_ARQUIVO"]."</a>
        <br><br>
    


<div id='resultado'></div>



    <textarea id='textInput ".$row["CD_ID_SEMANA"]."' class='merdadeinput' maxlength='200'>".$row["DS_SEMANA"]."</textarea>
    <button onclick='updatedescricao(this)' class='".$row["CD_DISCIPLINA"]."' id='".$row["CD_ID_SEMANA"]."'>Adicionar Conteudo</button>
    
        
        ";
    }
    


}

?>
