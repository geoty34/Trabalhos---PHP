function validarDesenho() {
    var nome = document.getElementById("nome").value;
    var per_favorito = document.getElementById("per_favorito").value;
    var cor = document.getElementById("cor").value;
    var cor = document.getElementById("cor").value;
    var url_img = document.getElementById("url_img").value;


    //validar se os campos estaõ preenchidos
    var divErro = document.getElementById("divErro");

    if (nome == "") {
        divErro.innerHTML = "Preencha o nome do personagem";
        return false;
    }
    if (per_favorito == "") {
        divErro.innerHTML = "Preencha o personagem preferido";
        return false;

    }
    if (ano == "") {
        divErro.innerHTML = "Preencha o ano";
        return false;

    }
    if (cor == "") {
        divErro.innerHTML = "Preencha a cor";
        return false;
    }
    if (url_img == "") {
        divErro.innerHTML = "Preencha a url";
        return false;
    }
   

    return false;
}