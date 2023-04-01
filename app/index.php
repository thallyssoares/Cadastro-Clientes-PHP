<?php 
    require_once "../classes/users.php";

    if(!empty($_POST["name"]) && !empty($_POST["senha"])){
        
        $usr = new Users();

        $usr->loginUser($_POST["name"], $_POST["senha"]);
    }

     else{
        echo "Preencha todos os campos";
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
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
            <input type="submit" value="Logar" class="submitInput">
            <button><a href="cadastro.php">Cadastrar</a></button>
        </form>
    </main>
</body>
</html>