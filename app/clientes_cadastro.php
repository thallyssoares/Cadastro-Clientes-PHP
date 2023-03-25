<?php 
    session_start();

    if(!$_SESSION["logado"]){
        header('location:index.php');
    }
    include_once "../functions/atualizar-dados-cliente.php";
    include_once "../functions/cadastro-cliente.php";
    include_once "../functions/deletar-cliente.php";

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