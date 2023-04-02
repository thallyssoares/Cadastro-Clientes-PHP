<?php 
    require_once "../classes/users.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>Login</h1>
        
        <form action="" method="post">
            <div class="nameArea">
                <label for="name">Nome/Email:</label>
                <input type="text" name="name" id="idName">
            </div>
            <br>
            <div class="senhaArea">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="idSenha">
            </div>
            <br>
            <div class="buttonArea">
                <input type="submit" value="Logar" class="submitInput">
                <button><a href="cadastro.php">Cadastrar</a></button>
            </div>
        </form>
        <?php 
            if(!empty($_POST["name"]) && !empty($_POST["senha"])){
        
                $usr = new Users();
        
                $usr->loginUser($_POST["name"], $_POST["senha"]);
            }
        
            else{
                echo "Preencha todos os campos";
            }       

        ?>
    </main>
</body>
</html>