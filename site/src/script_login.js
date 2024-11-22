const check = document.getElementById("check"); //Obtem o botao
check.addEventListener("change", mostrarSenha); //Quando o botao ser marcado sera chamado a funcao

function mostrarSenha() { 
    const password = document.getElementById("senha"); //Obtem o input

    if (check.checked) { //Caso a caixinha esteja marcada
        password.setAttribute('type', 'text'); //O tipo do input passara a ser texto ex: senha1234
    } else { //Caso esteja desmarcada
        password.setAttribute('type', 'password'); //O tipo do input passara a ser password ex: *********
    }
}