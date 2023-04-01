<?php 

class Users {
    private $_name;
    private $_email;
    private $_senha;


    public function loginUser($name, $senha){
        $this->_name = $name;
        $this->_senha = $senha;

        $arquivo = "../arquivos-txt/users.txt";
        $login = file($arquivo, FILE_SKIP_EMPTY_LINES);

        $nLogin = implode(" ", $login);

        $arrayLogin = explode(" ", $nLogin);
        $n = ltrim(rtrim($arrayLogin[5]));
        $arrayLogin[5] = $n;

        if(in_array($this->_senha, $arrayLogin) && in_array($this->_name, $arrayLogin)){
            
            //criando a sessão do usuario
            session_start();
            $_SESSION["nome"] = $this->_name;
            $_SESSION["senha"] = $this->_senha;
            $_SESSION["logado"] = true;            
            
            //transferindo o usuario pro painel administrativo
            header("location:admin_painel.php");


            
        } else {
            echo "<p>usuario não encontrado</p>";
            
        }
    }

    public function setNewUser($name, $email, $senha){
        
        if((strlen($name) !== 0) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($senha) !== 8)){
            $this->_name = $name;
            $this->_email = $email;
            $this->_senha = $senha;

            $arquivo = "../arquivos-txt/users.txt";

            $fp = fopen($arquivo, "a+");

            $newUSer = "nome: $this->_name email: $this->_email senha: $this->_senha \r\n";

            fwrite($fp, $newUSer);
            fclose($fp);

            echo "<p>Cadastro realizado com sucesso, você já pode voltar a página de login e logar na sua conta</p>";

        } else {
            echo "<p>Os dados digitados estão incorretos, por favor digite novamente</p>";
        }
        


    }

}





?>