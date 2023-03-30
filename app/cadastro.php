<?php 
    include_once "../functions/new_user.php";
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1>Cadastro novo usuario</h1>
        <form action="" method="post">
            <label for="name">Nome de usuario</label>
            <input type="text" name="user" id="idUser">
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" id="idEmail">
            <br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="idSenha">
            <br>
            <input type="submit" value="Cadastrar">

        </form>

        <?php 
            if(!empty($_POST["user"]) && !empty($_POST["email"]) && !empty($_POST["senha"])){
                echo "<p>Logado</p>";
            } else{
                echo "<p>Preencha todos os campos</p>";
            }
        
        ?>
    </main>
</body>
</html>