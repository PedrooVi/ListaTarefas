<?php
    //Conexao com o banco de dados
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "listabd";
    $conn = "";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Coleta as informacoes contidas no input 
        //Funcao isset retorna verdadeiro se houver algo e falso se nao houver
        //O operador ternario atribui o que esta dentro do input caso verdadeiro
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $register_email = isset($_POST["register-email"]) ? $_POST["register-email"] : "";
        $telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";
        $password_confirm = isset($_POST["password-confirm"]) ? $_POST["password-confirm"] : "";

        //Logica para procurar usuario ja cadastrado
        if($register_email != "" && $telefone == "") { //Procura por email caso o campo telefone esteja vazio 
            $query = "SELECT * FROM usuarios WHERE email = '$register_email'";
        } else if($register_email == "" && $telefone != "") { //Procura por telefone caso o email esteja vazio
            $query = "SELECT * FROM usuarios WHERE numerotelefone = '$telefone'"; 
        } else { //Procura pelos dois campos caso estejam preenchidos (resolução do problema de usuarios possuindo valor null em um dos campos logo não seria possivel cadastrar nunca)
            $query = "SELECT * FROM usuarios WHERE (email = '$register_email' AND numerotelefone = '$telefone')";
        }
        
        //Esta obtem dados se ja existe dentro do banco de dados 
        $verificarDadosExistentes = mysqli_query($conn, $query);

        if(mysqli_num_rows($verificarDadosExistentes) > 0) { //Caso retorne algum usuario
            echo "usuario ja cadastrado"; //!em desenvolvimento!
        } else {
            $query = "INSERT INTO usuarios VALUES('', '$nome', '$register_email', '$telefone', '$password_confirm')";
            mysqli_query($conn ,$query);
            header("Location: ../index.php"); //Redireciona para pagina de login
        }
    }
?>