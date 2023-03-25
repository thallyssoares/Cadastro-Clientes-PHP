<?php 

function cadastrarCliente(){
    if(!empty($_POST["nome"]) && !empty($_POST["emp"])){
        $n = $_POST["nome"];
        $e = $_POST["emp"];

        if(($_SESSION["nome"] == "soares" || $_SESSION["nome"] == "soares@gmail.com") && $_SESSION["senha"] == "alinetja"){

            $arquivo = "../arquivos-txt/clientes_Soares.txt";

            $fo = fopen($arquivo, "a+");

            $clientes = "nome: $n empresa: $e \r\n";
            
            fwrite($fo, $clientes);
            fclose($fo);

        } elseif(($_SESSION["nome"] == "thallys" || $_SESSION["nome"] == "thallys@hotmail.com") && $_SESSION["senha"] == "1206"){
            $arquivo = "../arquivos-txt/clientes_Thallys.txt";

            $fo = fopen($arquivo, "a+");

            $clientes = "nome: $n empresa: $e \r\n";
            
            fwrite($fo, $clientes);
            fclose($fo);
        }

        echo "Cliente: $n da empresa $e, cadastrado com sucesso";
    }
}

?>