<?php
    //Inicia uma sessao
    
    session_start();

    //Abre uma conexao com o banco de dados
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "listabd";
    $conn = "";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    //A variavel login recebe a informacao do email ou telefone cadastrado e verificado pelo login
    $login = $_SESSION["login"]; 
    
    $informacoesUsuario = "SELECT idusuario FROM usuarios WHERE (email = '$login' OR numerotelefone = '$login')"; //Seleciona o usuario correspondente ao login

    $usuario = mysqli_query($conn, $informacoesUsuario); //A variavel usuario recebe as informacoes de login vindas do banco
    $usuario = $usuario -> fetch_assoc(); //fetch_assoc() cria um objeto contendo indexes como campos da tabela e linhas como informacoes cadastradas ex: tabela contendo nome: isaac sobrenome: romero / ira criar um objeto e para obter a informacao basta atribuir o index como o campo nome ou sobronome / $usuario["nome"] ira retornar isaac ou $usuario["sobrenome"] = romero

    $idusuario = $usuario["idusuario"]; //Apenas captamos o id, pois é o que necessitamos

    if($_SERVER["REQUEST_METHOD"] == "POST") {      
        //Obtem a tarefa digitada pelo usuario
        //Sem necessitar de atribuir isset pois ja barramos a tarefa enviada como null em js
        $novaTarefa = $_POST["txtTarefa"];

        //Insere na tabela correspondente ao id do usuario a nova tarefa 
        $inserirDadosTabela = "INSERT INTO tarefas VALUES(default, '$novaTarefa', default, '$idusuario')";
        mysqli_query($conn, $inserirDadosTabela); 

        //header("Location: " . $_SERVER['PHP_SELF']); //Recarrega os cookies ("nao entendi muito bem, mas resolveu o problema de duplicata de dados")
        //exit;
        mostrarTarefas($conn, $idusuario);
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") { //Metodo get vindo do formulario de pesquisa
       $campoPesquisa = isset($_GET["txtBuscar"])? $_GET["txtBuscar"]: ""; //Obtem o que esta no campo de pesquisa
       $filtro = isset($_GET["filtro"])? $_GET["filtro"]: ""; //Obtem o que selecionado no campo de filtro Todos, Pendentes, Concluido
        
        //Para esta filtragem utilizei 6 hipoteses
        //1- Campo de pesquisa vazio + Filtro escolhido = todos
        //2- Campo de pesquisa vazio + Filtro escolhido = pendentes
        //3- Campo de pesquisa vazio + Filtro escolhido = concluidas
        //4- Campo de pesquisa preenchido + Filtro escolhido = todos
        //5- Campo de pesquisa preenchido + FIltro escolhido = pendentes
        //6- Campo de pesquisa preenchido + Filtro escolhido = concluidas
        //Para cada hipotese criei uma funcao para exibição !em desenvolvimento!

        if($campoPesquisa == "" && $filtro == "todos") { 
            mostrarTarefasNUTD($conn, $idusuario, $campoPesquisa);
        } else if($campoPesquisa == "" && $filtro == "pendentes") {
            mostrarTarefasNUPD($conn, $idusuario, $campoPesquisa);
        } else if($campoPesquisa == "" && $filtro == "concluidas") {
            mostrarTarefasNUCC($conn, $idusuario, $campoPesquisa);
        } else if($campoPesquisa != "" && $filtro == "todos") {
            mostrarTarefasCPTD($conn, $idusuario, $campoPesquisa);
        } else if($campoPesquisa != "" && $filtro == "pendentes") {
            mostrarTarefasCPPD($conn, $idusuario, $campoPesquisa);
        } else if($campoPesquisa != "" && $filtro == "concluidas") {
            mostrarTarefasCPCC($conn, $idusuario, $campoPesquisa);
        }
    }
    
    //RESUMO DE TODAS AS FUNCOES: o codigo que vai ser injetado no banco de dados será o select e para cada uma das funções as condições sera diferente um exemplo é a funcao que eu quero so as tarefas concluidas entao o a condição é por exemplo um select nome, estado where estado = concluida, para cada funcao é adaptada a saida dentro da tabela de forma padronizada os botaos estao em !em desenvolvimento!

    function mostrarTarefas($conn, $idusuario) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario'";
    
        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);
    
        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            if($linha["estado"] == 0) {
                echo "<tr>
                <td id='tarefa-{$idTarefa}' name='tarefa-{$idTarefa}'>" . $linha["nome"] . "</td>
                    <form action='../src/btnclicar_concluir.php' method='get'>
                        <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                        <td><button type='submit'>
                            <i class='fa-solid fa-check'></i>
                        </button></td>
                    </form>
                    <form action='../src/btnclicar_excluir.php' method='get'>
                        <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                        <td><button type='submit'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button></td>
                    </form>
                
                </tr>";
            } else {
                echo "<tr>
                <td>" . $linha["nome"] . "</td>
                <form action='../src/btnclicar_excluir.php' method='get'>
                    <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                    <td><button type='submit'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button></td>
                </form>
                </tr>";
            }
        }
    }

    function mostrarTarefasNUTD($conn, $idusuario, $campoPesquisa) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario'";
    
        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);
    
        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            if($linha["estado"] == 0) {
                echo "<tr>
                <td id='tarefa-{$idTarefa}' name='tarefa-{$idTarefa}'>" . $linha["nome"] . "</td>
                    <form action='../src/btnclicar_concluir.php' method='get'>
                        <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                        <td><button type='submit'>
                            <i class='fa-solid fa-check'></i>
                        </button></td>
                    </form>
                    <form action='../src/btnclicar_excluir.php' method='get'>
                        <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                        <td><button type='submit'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button></td>
                    </form>
                
                </tr>";
            } else {
                echo "<tr>
                <td>" . $linha["nome"] . "</td>
                <form action='../src/btnclicar_excluir.php' method='get'>
                    <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                    <td><button type='submit'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button></td>
                </form>
                </tr>";
            }
        }
    }

    function mostrarTarefasNUPD($conn, $idusuario, $campoPesquisa) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario' and estado = '0'";

        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);
        
        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            echo "<tr>
                <td id='tarefa-{$idTarefa}' name='tarefa-{$idTarefa}'>" . $linha["nome"] . "</td>
                <form action='../src/btnclicar_concluir.php' method='get'>
                    <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                    <td><button type='submit'>
                        <i class='fa-solid fa-check'></i>
                    </button></td>
                </form>
                <form action='../src/btnclicar_excluir.php' method='get'>
                    <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                    <td><button type='submit'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button></td>
                </form>
                </tr>";
        }
    }
    
    function mostrarTarefasNUCC($conn, $idusuario, $campoPesquisa) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario' and estado = '1'";

        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);

        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            echo "<tr>
            <td>" . $linha["nome"] . "</td>
            <form action='../src/btnclicar_excluir.php' method='get'>
                <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                <td><button type='submit'>
                    <i class='fa fa-trash' aria-hidden='true'></i>
                </button></td>
            </form>
            </tr>";
        }
    }

    function mostrarTarefasCPTD($conn, $idusuario, $campoPesquisa) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario' AND nome LIKE '$campoPesquisa%'";

        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);

        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            if($linha["estado"] == 0) {
                echo "<tr>
                <td id='tarefa-{$idTarefa}' name='tarefa-{$idTarefa}'>" . $linha["nome"] . "</td>
                <form action='../src/btnclicar_concluir.php' method='get'>
                    <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                    <td><button type='submit'>
                        <i class='fa-solid fa-check'></i>
                    </button></td>
                </form>
                <form action='../src/btnclicar_excluir.php' method='get'>
                    <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                    <td><button type='submit'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button></td>
                </form>
                </tr>";
            } else {
                echo "<tr>
                <td>" . $linha["nome"] . "</td>
                <form action='../src/btnclicar_excluir.php' method='get'>
                <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                <td><button type='submit'>
                    <i class='fa fa-trash' aria-hidden='true'></i>
                </button></td>
            </form>
                </tr>";
            }
        }
    }

    function mostrarTarefasCPPD($conn, $idusuario, $campoPesquisa) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario' AND nome LIKE '$campoPesquisa%' AND estado = '0'";

        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);

        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            echo "<tr>
            <td id='tarefa-{$idTarefa}' name='tarefa-{$idTarefa}'>" . $linha["nome"] . "</td>
            <form action='../src/btnclicar_concluir.php' method='get'>
                <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                <td><button type='submit'>
                    <i class='fa-solid fa-check'></i>
                </button></td>
            </form>
            <form action='../src/btnclicar_excluir.php' method='get'>
                <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                <td><button type='submit'>
                    <i class='fa fa-trash' aria-hidden='true'></i>
                </button></td>
            </form>
            </tr>";
        }
    }

    function mostrarTarefasCPCC($conn, $idusuario, $campoPesquisa) {
        $tarefasUsuario = "SELECT id, nome, estado FROM tarefas WHERE usuarios_idusuario = '$idusuario' AND nome LIKE '$campoPesquisa%' AND estado = '1'";

        $tarefasTabela = mysqli_query($conn, $tarefasUsuario);

        while($linha = $tarefasTabela  -> fetch_assoc()) {
            $idTarefa = $linha["id"];
            echo "<tr>
            <td>" . $linha["nome"] . "</td>
            <form action='../src/btnclicar_excluir.php' method='get'>
                <input type='hidden' name='tarefaId' value='". $idTarefa. "';>
                <td><button type='submit'>
                    <i class='fa fa-trash' aria-hidden='true'></i>
                </button></td>
            </form>
            </tr>";
        }
    }
?>