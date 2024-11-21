<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" href="../css/style_tarefas.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-image: url('../imgs/Background.jpg'); background-size: cover;">

    <div class="container_geral">
        <div class="container_esquerda">

            <h1>To Do List</h1>

            <div class="addTarefa">
                <form method="post" onsubmit="return adicionarTarefaNula()">
                    <label for="txtTarefa">Adicione sua tarefa</label>
                    <br>
                    <input type="text" id="txtTarefa" name="txtTarefa" placeholder="O que você vai fazer?">
                <button class="btn_add">
                        <i class="fa-thin fa-plus"> </i>
                </button>
                </form>
            </div>

            <div class="pesquisa">  
                <form method="get">
                    <label for="txtBuscar">Pesquisar</label>
                    <br>
                    <input type="text" name="txtBuscar" placeholder="Buscar...">
                    <button class="btn_pesquisa" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
                
                <div class="filtro">
                    <label for="filtro">Filtrar: </label>
                    <br>
                    <select name="filtro" id="filtro">
                        <option value="todos">Todos</option>
                        <option value="pendentes">Pendentes</option>
                        <option value="concluidas">Concluidas</option>
                    </select>
                </form>    
            </div> 
        </div>

        <div class="container_direita">
            <table class="tarefinhas">
                 <h3>Suas Tarefas</h3>
                <thead>
                    <!-- ISAAAAAAACCCC NAO ESQUECE ESSES BOOOTTOOOEESSSS (NAO ESQUECI!) -->
                    <!-- TABELA É COISA DE ARROMBADO, EU ODEIO TABELAS EM HTML 😠 -->
                </thead>
                <tbody>
                    <?php
                        require_once('../src/tarefasbd.php'); //Link para o php sem redirecionar
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="..\src\script_tarefas.js"></script>
</html>