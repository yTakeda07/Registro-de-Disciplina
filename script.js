function clicado(botao) {
    let NM_DISCIPLINA = document.getElementById('Disciplina').value;
    let QT_CARGA_ANUAL = document.getElementById('CargaAnual').value;
    let QT_CARGA_SEMANAL = document.getElementById('CargaSemanal').value;
    let NM_AVALIACAO = document.getElementById('QuantidadeAvaliacao').value;
    let TP_DISCIPLINA = document.getElementById('TipoDisciplina').value;

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


window.onload = function() {
    const paginaAtual = window.location.pathname.split('/').pop();
if(paginaAtual === "index.html"){

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

estilomain()

}else{}
};


function apagarMateria(botao){
    
    const confirmacao = window.confirm("Voce Tem certeza que deseja excluir esta materia?")
    if(confirmacao == true){

        var id = botao.id;
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

    estilomain()

    }
}



function detalhesCliques(botao){
    const id = botao.id;

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
    
const mainElement = document.querySelector("main");
if (mainElement) {
  mainElement.style.display = "";
  mainElement.style.gridTemplateColumns = "";
  mainElement.style.gap = "";
  mainElement.style.margin = "";
  mainElement.style.padding = "";
}

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

estilomain()

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