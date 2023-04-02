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
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1 class="cadH1">Cadastro novo usuario</h1>
        <form action="" method="post">
            <div class="nameArea">
            <label for="name">Usuario:</label>
            <input type="text" name="user" id="idUser">
            </div>
            <br>
            <div class="emailArea">
            <label for="email">Email:</label>
            <input type="text" name="email" id="idEmail">
            </div>
            <br>
            <div class="senhaArea">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="idSenha">
            </div>
            <br>
            <div class="buttonArea">
            <input type="submit" value="Cadastrar">
            <button><a href="index.php">Voltar</a></button>
            </div>
        </form>

        <?php 
            if(!empty($_POST["user"]) && !empty($_POST["email"]) && !empty($_POST["senha"])){
                $usr = new Users;
                $usr->setNewUser($_POST["user"], $_POST["email"], $_POST["senha"]);

            } else{
                echo "<p>Preencha todos os campos</p>";
            }
        
        ?>

    </main>
</body>
</html>