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
    <link rel="stylesheet" href="../styles/style.css">
    <title>Logado</title>
</head>
<body>
    <header>
        <h1>Painel Administrativo</h1>
        <nav>               
            <a href="admin_painel.php?action=cadastro" class="largeMenu">Cadastrar Cliente</a>
            <a href="admin_painel.php?action=deletar" class="largeMenu">Deletar Cliente</a>
            <a href="admin_painel.php?action=atualizar" class="largeMenu">Atualizar Cliente</a>
            <a href="admin_painel.php?action=mostrar" class="largeMenu">Mostrar Clientes</a>
            <a href="admin_painel.php?action=sair" class="largeMenu">Sair da Conta</a>
            <div class="shortMenu">
                <a href="admin_painel.php?action=cadastro">Cadastrar</a>
                <a href="admin_painel.php?action=deletar">Deletar</a>
                <a href="admin_painel.php?action=atualizar">Atualizar</a>
                <a href="admin_painel.php?action=mostrar">Mostrar</a>
                <a href="admin_painel.php?action=sair">Sair</a>
            </div>    
        </nav>    
    </header>
    <main class="mainPainel">
        <?php    
            if(!empty($_GET["action"])){    
                switch($action){    
                    case "cadastro":    
                        echo '<form action="" method="post">
                                <div class="nameArea">
                                <label for="nome">Nome do Cliente:</label>
                                <input type="text" name="nome" id="idNome">
                                </div>
                                <div class="empArea">
                                <label for"emp">Empresa:</label>
                                <input type="text" name="emp" id="idEmp">
                                </div>
                                <div class="buttonArea">
                                <input type="submit" value="Cadastrar">
                                </div>
                        </form>';
                        cadastrarCliente();
                        break;
                    case "deletar":
                        echo '<form action="" method="post">
                            <div class="nameAreaDelet">
                            <label>Qual o cliente gostaria de deletar?</label><br>
                            <input type="text" name="nomeCliente" id="idNomeCliente">
                            </div>
                            <div class="buttonArea">
                            <input type="submit" value="Deletar">
                            </div>
                        </form>';
                        deletarCliente();
                        break;
                    case "atualizar":
                        echo '<form action="" method="post">
                            <div class="buttonAreaAtual">
                            <input type="submit" name="mNome" value="Mudar Nome">
                            <input type="submit" name="mEmp" value="Mudar Empresa">
                            </div>
                        </form>';
                        if(isset($_POST["mNome"]) || isset($_POST["mEmp"])){
                            
                            if(!empty($_POST["mNome"])){
                                echo '<form action="" method="post">
                                    <div class="nameArea">
                                    <label for="antClient">Qual o cliente?</label>
                                    <input type="text" name="antClient" id="idAntClient"><br>
                                    <label for="nNome">Insira o novo nome:</label>
                                    <input type="text" name="newNome" id="idNewNome">
                                    </div>
                                    <div class="buttonArea">
                                    <input type="submit" value="Atualizar">
                                    </div>
                                </form>';
                            } elseif(!empty($_POST["mEmp"])){
                                echo '<form action="" method="post">
                                    <div class="empArea">
                                    <label for="antEmp">Qual a empresa?</label>
                                    <input type="text" name="antEmp" id="idAntEmp"><br>
                                    <label for="nEmp">Insira a nova empresa:</label>
                                    <input type="text" name="newEmp" id="idNewEmp">
                                    </div>
                                    <div class="buttonArea">
                                    <input type="submit" value="Atualizar">
                                    </div>
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