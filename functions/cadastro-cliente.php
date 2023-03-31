<?php 

function cadastrarCliente(){
    //verifica se os metodos não estão vazios, se não estiver ele cadastra o cliente no arquivo respectivo
    if(!empty($_POST["nome"]) && !empty($_POST["emp"])){
        $n = $_POST["nome"];
        $e = $_POST["emp"];

        $arquivo = "../arquivos-txt/clientes_". $_SESSION["nome"] . ".txt";

        $fo = fopen($arquivo, "a+");

        $clientes = "Nome: $n Empresa: $e \r\n";
        

        fwrite($fo, $clientes);
        fclose($fo);
        

    }
}

?>