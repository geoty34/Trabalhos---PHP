
const baseUrl = document.getElementById('hddBaseUrl').value;

const inputAno = document.getElementById('txtAno');
const inputCurso = document.getElementById('somCurso');
const inputDisciplina = document.getElementById('somDisciplina');

const divErros = document.getElementById('divMsgErros');

buscarDisciplinas();


function buscarDisciplinas() {
    // Remover os options existentes em disciplina
    while (inputDisciplina.children.length > 0) {
        inputDisciplina.children[0].remove();

    }

    criarOptionDisciplina("---Selecione---", "", "--")

    var idSelecionado =
        inputDisciplina.getAttribute("idSelecionado");

    // Requisição Ajax
    var xhttp = new XMLHttpRequest()

    var url = baseUrl + "/api/listar_por_curso.php?idCurso=" +
        inputCurso.value;
    xhttp.open('GET', url);

    // Função de retorno executada após a resposta do servidor chegar no cliente
    xhttp.onload = function () {
        console.log("Resposta recebida pelo servidor");

        var json = xhttp.responseText;
        var diciplinas = JSON.parse(json);

        diciplinas.forEach(disc => {
            // console.log(disc.codigo);
            criarOptionDisciplina(disc.nome, disc.id, idSelecionado);


        });

    }

    xhttp.send();
    console.log("Requisição enviada ao servidor!");
    console.log("Nova mensagem!");
    console.log("Nova mensagem 2!");



    // console.log(resposta);

}

function criarOptionDisciplina(desc, valor, valorSelecionado) {

    var option = document.createElement("option");
    option.innerHTML = desc;
    option.setAttribute("value", valor);

    if (valor == valorSelecionado)
        option.selected = true;

    inputDisciplina.appendChild(option);
}
function inserirTurma (){
    // console.log("Inserindo Turma!");
    // console.log(inputAno.value);
    // console.log(inputCurso.value);
    // console.log(inputDisciplina.value);

    // Estrutura FormData para enviar os parametros no corpo da requisição do tipo post
    var dados = new FormData();
    dados.append("ano", inputAno.value);
    dados.append("idCurso", inputCurso.value);
    dados.append("idDisc", inputDisciplina.value);

    // Requisição ajax
    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/inserir_turma.php";
    // REQUISIÇÃO ASSINCRONA
    xhttp.open("POST", url);

    xhttp.onload = function() {
        var resposta = xhttp.responseText;
        // console.log(resposta);
        if(resposta){
            divMsgErros.innerHTML = resposta;
            divMsgErros.style.display = "block";
        } else {
            window.location = "listar.php";

        }

    }
    xhttp.send(dados);
} 

    



// function testeBreak(x){
//     var i = 0;

//     while (i < 6){
//         if(i == 3)
//         break;
//     }
//     returni * x;
// }




