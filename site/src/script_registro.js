function verificarCredenciais() { //Desenvolvemos uma funcao para verificar hipoteses de nao concordancia de requirementos propostos
    //Cada if ira verificar um tipo de hipotese
    //Todos os alerts poderao sofrer alteracoes uma vez que usar alerts não é comum em sites presentes no mercado
    //Alerts = //!em desenvolvimento!
    if(!verificarEmail()) { 
        alert('Preencha algum dos campos [Email ou Telefone]');
        return false;
    } else if(verificarNull()) {
        alert('Campo de senha vazio');
        return false;
    } else if(!verificarTamanho()) {
        alert('A senha deve ter no minimo 8 caracteres');
        return false;
    } else if(!compararSenha()) {
        alert('Senhas não coincidem');
        return false;
    } 

    return true; //Prossegui para proxima etapa
}

function verificarEmail() {
    let emailRegistrado = document.getElementById('register-email').value;
    let telefoneRegistrado = document.getElementById('telefone').value;

    if(emailRegistrado != "" && telefoneRegistrado == "") { //Email preenchido Telefone não
        return true;
    } else if(emailRegistrado == "" && telefoneRegistrado != "") { //Telefone preenchido Email não
        return true;
    } else if(emailRegistrado != "" && telefoneRegistrado != "") { //Caso os dois estejam preenchidos
        return true
    } 
    
    return false; //Caso os dois nao estejam preenchidos dispara um alert e pede ao usuario para preencher barrando a proxima etapa
}

function verificarNull() {
    let senhaRegistrar = document.getElementById('password-register');
    let senhaConfirmar = document.getElementById('password-confirm');
    senhaRegistrar = senhaRegistrar.value;
    senhaConfirmar = senhaConfirmar;

    if(senhaConfirmar == "" || senhaRegistrar == "") { //Barra a proxima etapa se algum dos campos estiver vazio (Confirmacao de Senha e Registro)
        return true;
    } 

    return false;
}

function verificarTamanho() {
    let senhaRegistrar = document.getElementById('password-register');
    let senhaConfirmar = document.getElementById('password-confirm');
    senhaRegistrar = senhaRegistrar.value;
    senhaConfirmar = senhaConfirmar.value;

    if(senhaRegistrar.length >= 8) { //Verifica o tamanho da senha sendo o minimo 8 digitos
        return true;
    }

    return false; 
}

function compararSenha() {
    let senhaRegistrar = document.getElementById('password-register');
    let senhaConfirmar = document.getElementById('password-confirm');
    senhaRegistrar = senhaRegistrar.value;
    senhaConfirmar = senhaConfirmar.value;

    if(senhaRegistrar != senhaConfirmar) {
        return false; //Caso as senhas sejam diferentes ira retornar false
    } 

    return true; //Caso contrario ira retornar verdadeiro
}

function mostrarSenha() {
    const password = document.getElementById("password-register");
    const passwordConfirm = document.getElementById("password-confirm")

    if (check.checked) { //Funcao na gambiarra ja explicada na tela de registro apenas um copia e cola ;)
        password.setAttribute("type", "text");
        passwordConfirm.setAttribute("type", "text")
    } else {
        password.setAttribute("type", "password");
        passwordConfirm.setAttribute("type", "password")
    }
}

const check = document.getElementById('check')
check.addEventListener("change", mostrarSenha)