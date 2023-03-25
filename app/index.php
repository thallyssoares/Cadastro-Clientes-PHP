<?php 

    if(!empty($_POST["name"]) && !empty($_POST["senha"])){
        
        $nLogin = "soares";
        $emailLogin = "soares@gmail.com";
        $sLogin = "alinetja";
        
        $nome = $_POST["name"];
        $senha = $_POST["senha"];


        if($nome == $nLogin || $nome == $emailLogin){
            if($senha == $sLogin){
                session_start();
                $_SESSION["nome"] = $nome;
                $_SESSION["senha"] = $senha;
                $_SESSION["logado"] = true;
                header("location:clientes_cadastro.php");

            } else{
                echo "<p>Senha Incorreta</p>";
            }
        } else{
            echo "<p>Dados de login incorretos</p>";
        }
    } else{
        echo "Preencha todos os campos";
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <label for="name">Nome ou Email:</label>
            <input type="text" name="name" id="idName">
            <br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="idSenha">
            <br>
            <input type="submit" value="Logar">
        </form>
    </main>
</body>
</html>