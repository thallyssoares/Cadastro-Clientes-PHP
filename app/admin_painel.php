<?php 
    session_start();

    if(!$_SESSION["logado"]){
        header('location:index.php');
    }
    include_once "../functions/atualizar-dados-cliente.php";
    include_once "../functions/cadastro-cliente.php";
    include_once "../functions/deletar-cliente.php";
    include_once "../functions/mostrar-clientes.php";

    if(!empty($_GET["action"])){
        $action = $_GET["action"];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logado</title>
</head>
<body>
    <main>
        <ul>
            <li><a href="clientes_cadastro.php?action=cadastro">Cadastrar Clientes</a></li>
            <li><a href="clientes_cadastro.php?action=deletar">Deletar Cliente</a></li>
            <li><a href="clientes_cadastro.php?action=atualizar">Atualizar Cliente</a></li>
            <li><a href="clientes_cadastro.php?action=mostrar">Mostrar Clientes</a></li>
            <li><a href="clientes_cadastro.php?action=sair">Sair da Conta</a></li>
            
        </ul>
        <?php
            if(!empty($_GET["action"])){
                switch($action){
                    case "cadastro":
                        echo '<form action="" method="post">
                                <label for="nome">Nome do Cliente:</label>
                                <input type="text" name="nome" id="idNome">
                                <label for"emp">Empresa:</label>
                                <input type="text" name="emp" id="idEmp">
    
                                <input type="submit" value="Cadastrar">
                        </form>';
                        cadastrarCliente();
                        break;
                    case "deletar":
                        echo '<form action="" method="post">
                            <label>Qual o cliente gostaria de deletar?</label>
                            <input type="text" name="nomeCliente" id="idNomeCliente">
                            <input type="submit" value="Deletar">
                        </form>';
                        deletarCliente();
                        break;
                    case "atualizar":
                        echo '<form action="" method="post">
                            <input type="submit" name="mNome" value="Mudar Nome">
                            <input type="submit" name="mEmp" value="Mudar Empresa">
                        </form>';
                        if(isset($_POST["mNome"]) || isset($_POST["mEmp"])){
                            
                            if(!empty($_POST["mNome"])){
                                echo '<form action="" method="post">
                                    <label for="antClient">Qual o cliente?</label>
                                    <input type="text" name="antClient" id="idAntClient">
                                    <label for="nNome">Insira o novo nome:</label>
                                    <input type="text" name="newNome" id="idNewNome">
                                    <input type="submit" value="Atualizar">
                                </form>';
                            } elseif(!empty($_POST["mEmp"])){
                                echo '<form action="" method="post">
                                    <label for="antEmp">Qual a empresa?</label>
                                    <input type="text" name="antEmp" id="idAntEmp">
                                    <label for="nEmp">Insira a nova empresa:</label>
                                    <input type="text" name="newEmp" id="idNewEmp">
                                    <input type="submit" value="Atualizar">
                                </form>';
                            }
                            
                        }
                        atualizarDados();
                        break;
                    case "mostrar":
                        mostrarClientes();
                        break;
                    case "sair":
                        if(isset ($_SESSION["logado"])){
                            session_destroy();
                            header("location:index.php");
                        }
                        break;
                }    
            }
            
        ?>
    </main>
</body>
</html>