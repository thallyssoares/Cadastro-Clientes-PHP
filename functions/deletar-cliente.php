<?php 

    function deletarCliente(){
        if(!empty($_POST["nomeCliente"])){
            $nomeCliente = $_POST["nomeCliente"];

            //caso o usuario queira apagar todos os clientes basta digitar "todos"
            //esse codigo zera o arquivo com os clientes do usuario respectivo.

            if($nomeCliente == "todos" || $nomeCliente == "Todos" || $nomeCliente == "TODOS"){
                $arquivo = "../arquivos-txt/clientes_". $_SESSION["name"] .".txt";
                $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

                $string = implode(" ",$clients); 
                $newStringArray = explode(" ", $string);
                
                $array = [];
                $clearArray = array_diff($array, $newStringArray);
                
                
                
                $newString = implode(" ", $clearArray);                
                unlink($arquivo);

                $fp = fopen($arquivo, "a+");

                fwrite($fp, $newString);
                fclose($fp);

                echo "<p>Todos os clientes deletados</p>";
                
            }else{
                //aqui ele apaga um cliente especifico
            
                $arquivo = "../arquivos-txt/clientes_". $_SESSION["nome"] . ".txt";
                $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

                $string = implode(" ",$clients); 
                $newStringArray = explode(" ", $string);

                $key = array_search($nomeCliente, $newStringArray);

                if($key !== false){

                    //codigo pra apagar o todos os dados do cliente.

                    unset($newStringArray[$key-1]); 
                    unset($newStringArray[$key]); 
                    unset($newStringArray[$key+1]); 
                    unset($newStringArray[$key+2]);
                    
                
                    $newString = implode(" ", $newStringArray);                
                    $nString = ltrim(rtrim($newString));
                    unlink($arquivo);

                    $fp = fopen($arquivo, "a+");
                    fwrite($fp, $nString);
                    fclose($fp); 
                    
                    
                    echo "<p>Cliente deletado com sucesso!!</p>";

                } else {
                    echo "<p>Não foi possivel encontrar o cliente</p>";
                }
            }

        

        
        
    }
}



?>