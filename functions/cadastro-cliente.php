<?php 

function cadastrarCliente(){
    if(!empty($_POST["nome"]) && !empty($_POST["emp"])){
        $n = $_POST["nome"];
        $e = $_POST["emp"];

        echo "Cliente Cadastrado";
    }
}

?>