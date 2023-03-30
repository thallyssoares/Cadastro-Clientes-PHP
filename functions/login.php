<?php 

    function login($user, $senha){
        $arquivo = "../arquivos-txt/users.txt";
        $login = file($arquivo, FILE_SKIP_EMPTY_LINES);

        //transformando o array em string
        $nLogin = implode(" ", $login);

        //transformando a string em array pra melhorar a validação
        $arrayLogin = explode(" ", $nLogin);

        $n = ltrim(rtrim($arrayLogin[5]));

        $arrayLogin[5] = $n;

        if(in_array($senha, $arrayLogin) && in_array($user, $arrayLogin)){
            
            //criando a sessão do usuario
            session_start();
            $_SESSION["nome"] = $user;
            $_SESSION["senha"] = $senha;
            $_SESSION["logado"] = true;
            
            //transferindo o usuario pro painel administrativo
            header("location:admin_painel.php");


            
        } else {
            echo "<p>usuario não encontrado</p>";
            
        }
        
        
    }




?>