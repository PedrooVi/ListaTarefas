<?php
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
    
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $tarefaId = $_GET["tarefaId"]; 
            $codigoUpdate = "DELETE FROM tarefas WHERE id = '$tarefaId' AND usuarios_idusuario = '$idusuario'";
            $delete = mysqli_query($conn, $codigoUpdate);

            header("Location: ../pags/tarefas.php?txtBuscar=&filtro=todos");
        }
?>