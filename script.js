$(document).ready(function() {
    
}); 

$(document).on('click','#btn-click', function(){
    var sname = $("#sname").val();
    var fname = $("#fname").val();
    $("#resultado").html("Carregando...");
    analisarCasal(sname,fname);
});

function analisarCasal(sname,fname){

    $.ajax({
        url: "https://love-calculator.p.rapidapi.com/getPercentage?sname="+sname+"&fname="+fname,
        type: "GET",
        dataType: 'json',  
        async: true,
        crossDomain: true,
        headers: {
            "X-RapidAPI-Key": "580a15097cmshae0fc56a187fb11p1622fcjsn5450de7ba91e",
            "X-RapidAPI-Host": "love-calculator.p.rapidapi.com"
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('jqXHR: \n'+jqXHR);
            console.log('textStatus: \n'+textStatus);
            console.log('errorThrown: \n'+errorThrown);
        },
        success: function(retorno){
            var dados = JSON.parse(JSON.stringify(retorno));
            traduzir(dados['result']);

            $("#resultado").html("O casal "+dados['fname']+" & "+dados['sname']+"<br> Tem "+dados['percentage']+"% de compatibilidade de dá certo. <br><br> <b id='result2'></b>");

        }
    });

}

function traduzir(frase){/*
    $.ajax({
        url: "https://google-translate1.p.rapidapi.com/language/translate/v2/detect",
        type: "POST",
        data: "q="+frase+"&target=pt&source=en",
        dataType: 'json',
        async: true,
        crossDomain: true,
        headers: {
            "content-type": "application/x-www-form-urlencoded",
            "Accept-Encoding": "application/gzip",
            "X-RapidAPI-Key": "580a15097cmshae0fc56a187fb11p1622fcjsn5450de7ba91e",
            "X-RapidAPI-Host": "google-translate1.p.rapidapi.com"
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('jqXHR: \n'+jqXHR);
            console.log('textStatus: \n'+textStatus);
            console.log('errorThrown: \n'+errorThrown);
        },
        success: function(retorno){
            var dados = JSON.parse(JSON.stringify(retorno));

            return dados["data"]["translations"][0]["translatedText"];
        }
    });*/

    const settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://google-translate1.p.rapidapi.com/language/translate/v2",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "Accept-Encoding": "application/gzip",
            "X-RapidAPI-Key": "580a15097cmshae0fc56a187fb11p1622fcjsn5450de7ba91e",
            "X-RapidAPI-Host": "google-translate1.p.rapidapi.com"
        },
        "data": {
            "q": frase,
            "target": "pt",
            "source": "en"
        }
    };
    
    $.ajax(settings).done(function (response) {
        var dados = JSON.parse(JSON.stringify(response));

        $("#result2").html(dados["data"]["translations"][0]["translatedText"]);
    });



}