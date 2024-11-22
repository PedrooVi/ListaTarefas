function adicionarTarefaNula() {
    campoTarefa = document.getElementById('txtTarefa'); //Verifica a adicao de uma tarefa vazia
    campoTarefa = campoTarefa.value;

    if(campoTarefa == "") {
        alert("Digite uma tarefa!"); //!em desenvolvimento!

        return false;
    } 

    alert("tarefa adicionada com sucesso!"); //!em desenvolvimento!
    return true;
}

//!em desenvolvimento!
/* Esta funcao possa ser obsoleta uma vez que possui duas formas de pesquisar
Por texto e Por filtro 
function pesquisarTarefaNula() {
    campoPesquisaTarefa = document.getElementById('txtBuscar');
    campoPesquisaTarefa = campoPesquisaTarefa.value;

    if(campoPesquisaTarefa == "") {
        alert("null");
        
        return false;
    } 

    alert("pesquisando...");
    return true;
}
*/