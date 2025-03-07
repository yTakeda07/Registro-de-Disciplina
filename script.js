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
$(".main").html(resp); 
}).fail(function(jqXHR, textStatus) {
alert("Falha na requisição AJAX: " + textStatus);
}).always(function() {
console.log("Requisição AJAX registro concluída");
});


}else{}
};