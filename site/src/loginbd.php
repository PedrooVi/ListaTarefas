<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Coleta informacoes contidas no input
        $login = $_POST["acesso"];
        $senha = $_POST["password"];

        //Abre conexao com o banco de dados
        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "listabd";
        $conn = "";
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

        //Procura o usuario com as informacoes contidas nos inputs login e senha
        $query = "SELECT * FROM usuarios WHERE (email = '$login' OR numerotelefone = '$login') AND senha = '$senha'";

        $cadastro = mysqli_query($conn, $query); //Atribui o resultado a variavel cadastro 
        
        if(mysqli_num_rows($cadastro) > 0) { //Se o usuario possuir cadastro
            session_start(); //Inicia uma sessao
            $_SESSION["login"] = $login; 
            header('Location: pags/tarefas.php'); //Redireciona para pagina de tarefas
        } else {
            echo "Login ou senha incorretos"; //!em desenvolvimento!
        }
    }  
?>