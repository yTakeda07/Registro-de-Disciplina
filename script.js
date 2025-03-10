function clicado(botao) {
    let NM_DISCIPLINA = document.getElementById('Disciplina').value;
    let QT_CARGA_ANUAL = document.getElementById('CargaAnual').value;
    let QT_CARGA_SEMANAL = document.getElementById('CargaSemanal').value;
    let NM_AVALIACAO = document.getElementById('QuantidadeAvaliacao').value;
    let TP_DISCIPLINA = document.getElementById('TipoDisciplina').value;
        //pega os valores inserios pelo usuario para registrar
    $.ajax({
        url: "registro.php",
        type: "POST",
        data: { 
            nm_disciplina: NM_DISCIPLINA,
            qt_carga_anual: QT_CARGA_ANUAL,
            qt_carga_semanal: QT_CARGA_SEMANAL,
            nm_avaliacao: NM_AVALIACAO,
            tp_disciplina: TP_DISCIPLINA
        }, 
        dataType: "html"
    }).done(function(resp) {
        $(".caixa").html(resp); 
    }).fail(function(jqXHR, textStatus) {
        alert("Falha na requisição AJAX: " + textStatus);
    }).always(function() {
        console.log("Requisição AJAX concluída");
    });
};
    //ajax que registra as informações iniciais



window.onload = function() { //quando a pagina carregar
    const paginaAtual = window.location.pathname.split('/').pop();
        //define qual é a pagina atual
if(paginaAtual === "index.html"){
    //se a pagina atual for index.html, faça
    $.ajax({
        url: "carregada.php",
        type: "POST",
        data: { acao: "verificar" },
     dataType: "html"
}).done(function(resp) {
$("main").html(resp); 
}).fail(function(jqXHR, textStatus) {
alert("Falha na requisição AJAX: " + textStatus);
}).always(function() {
console.log("Requisição AJAX registro concluída");
});
    //ajax que carrega os cards ao carregar a pagina

estilomain()
    //define o estilo do main
}else{}
};


function apagarMateria(botao){
    
    const confirmacao = window.confirm("Voce Tem certeza que deseja excluir esta materia?") //confim pra nao excluir uma materia sem querer kk
    if(confirmacao == true){
        //se o usuario colocar sim, faz
        var id = botao.id; //pega o id do botao clicado
        $.ajax({
            url: "apagarMateria.php",
            type: "POST",
            data: { id: id },
         dataType: "html"
    }).done(function(resp) {
    $("main").html(resp); 
    }).fail(function(jqXHR, textStatus) {
    alert("Falha na requisição AJAX: " + textStatus);
    }).always(function() {
    console.log("Requisição AJAX registro concluída");
    });
        //ajax para apagar a materia correspondende ao id do botao selecionado
    estilomain()
        //define o estilo do main
    }
}



function detalhesCliques(botao){
    const id = botao.id; //pega o id do botao clicado

    $.ajax({
        url: "informacoes.php",
        type: "POST",
        data: { id: id },
     dataType: "html"
}).done(function(resp) {
$("main").html(resp); 
}).fail(function(jqXHR, textStatus) {
alert("Falha na requisição AJAX: " + textStatus);
}).always(function() {
console.log("Requisição AJAX registro concluída");
});
    //ajax que ao clicar no botao ver detalhes carrega a pagina de semanas referente ao id do botao
zerarestilomain()
    //carrega o estilo do main
}
function voltar(botao){
    $.ajax({
        url: "carregada.php",
        type: "POST",
        data: { acao: "verificar" },
     dataType: "html"
}).done(function(resp) {
$("main").html(resp); 
}).fail(function(jqXHR, textStatus) {
alert("Falha na requisição AJAX: " + textStatus);
}).always(function() {
console.log("Requisição AJAX registro concluída");
});
    // quando o botao de voltar é clicado
estilomain()
    //define o estilo do main
}

function estilomain(){
    const mainElement = document.querySelector("main");
    if (mainElement) {
      mainElement.style.display = "grid";
      mainElement.style.gridTemplateColumns = "repeat(5, 1fr)";
      mainElement.style.gap = "20px";
      mainElement.style.margin = "20px";
      mainElement.style.padding = "10px";
    }
}
    //função de definir o main para os cards

function updatedescricao(botao){

    const id = botao.id; //pega o id do botao
    const classe = botao.className; //pega a classe do botao
    const valor = document.getElementById(id).value; //pega o valor que foi colocado pelo usuario para ser atualizado
    $.ajax({
        url: "UpdateSemana.php",
        type: "POST",
        data: { id: id, class: classe, valor:valor },
     dataType: "html"
}).done(function(resp) {
$("main").html(resp); 
}).fail(function(jqXHR, textStatus) {
alert("Falha na requisição AJAX: " + textStatus);
}).always(function() {
console.log("Requisição AJAX registro concluída");
});
    //ajax para atualizar o conteudo do ds_semana
zerarestilomain()
    //defini o main
}

function zerarestilomain(){
    const mainElement = document.querySelector("main");
if (mainElement) {
  mainElement.style.display = "";
  mainElement.style.gridTemplateColumns = "";
  mainElement.style.gap = "";
  mainElement.style.margin = "";
  mainElement.style.padding = "";
}
}
    //zera o estilo do main