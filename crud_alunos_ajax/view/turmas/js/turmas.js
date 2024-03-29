
const baseUrl = document.getElementById('hddBaseUrl').value;

const inputCurso = document.getElementById('somCurso');
const inputDisciplina = document.getElementById('somDisciplina');

buscarDisciplinas();


function buscarDisciplinas() {
    // Remover os options existentes em disciplina
    while (inputDisciplina.children.length > 0) {
        inputDisciplina.children[0].remove();

    }

    // Requisição Ajax
    var xhttp = new XMLHttpRequest()

    var url = baseUrl + "/api/listar_por_curso.php?idCurso=" +
        inputCurso.value;
    xhttp.open('GET', url, false);

    xhttp.send();

    var json = xhttp.responseText;
    var diciplinas = JSON.parse(json);

    criarOptionDisciplina("---Selecione---", "", "--")

    var idSelecionado = 
        inputDisciplina.getAttribute("idSelecionado");
    diciplinas.forEach(disc => {
        // console.log(disc.codigo);
        criarOptionDisciplina(disc.nome, disc.id, idSelecionado);


    });
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

// function testeBreak(x){
//     var i = 0;

//     while (i < 6){
//         if(i == 3)
//         break;
//     }
//     returni * x;
// }




