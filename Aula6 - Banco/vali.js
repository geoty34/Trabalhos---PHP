function validar() {
    var tit = document.getElementById("titulo").value;
    var genero = document.getElementById("genero").value;
    var qtd_paginas = document.getElementById("qtd_paginas").value;
    var autor = document.getElementById("autor").value;

    var div = document.getElementById("divMsg");

    if (tit == "") {
        div.innerHTML = "Preencha o campo nome";
        return false;
    }

    if (genero == "") {
        div.innerHTML = "Preencha o campo genero";
        return false;
    }
    if (qtd_paginas == "") {
        div.innerHTML = "Preencha o campo";
        return false;
    }
    if (autor == "") {
        div.innerHTML = "Preencha o campo autor";
        return false;
    }

    return false;

}