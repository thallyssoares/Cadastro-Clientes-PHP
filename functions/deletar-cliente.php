<?php 
    function deletarCliente(){
        if(!empty($_POST["nomeCliente"])){
            $nomeCliente = $_POST["nomeCliente"];

            if(($_SESSION["nome"]=="soares" || $_SESSION["nome"]=="soares@gmail.com") && $_SESSION["senha"]=="alinetja"){
                if($nomeCliente == "todos" || $nomeCliente == "Todos" || $nomeCliente == "TODOS"){
                    $arquivo = "../arquivos-txt/clientes_Soares.txt";
                    $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

                    $string = implode(".",$clients); 
                    $newStringArray = explode(".", $string);
                    
                    $array = [];
                    $clearArray = array_diff($array, $newStringArray);
                    
                    
                    $newString = implode(".", $clearArray);                
                    unlink($arquivo);

                    $fp = fopen($arquivo, "a+");

                    fwrite($fp, $newString);
                    fclose($fp);

                    echo "<p>Todos os clientes deletados</p>";
                    
                }else{

                
                    $arquivo = "../arquivos-txt/clientes_Soares.txt";
                    $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

                    $string = implode(".",$clients); 
                    $newStringArray = explode(".", $string);

                    $key = array_search($nomeCliente, $newStringArray);

                    if($key !== false){
                        $newStringArray[$key-1] = "";
                        $newStringArray[$key] = "";
                        $newStringArray[$key+1] = "";
                        $newStringArray[$key+2] = "";
                        
                        $newString = implode(".", $newStringArray);                
                        unlink($arquivo);

                        $fp = fopen($arquivo, "a+");
                        fwrite($fp, $newString);
                        fclose($fp); 
                        
                        echo "<p>Cliente deletado com sucesso!!</p>";

                    } else {
                        echo "<p>Não foi possivel encontrar o cliente</p>";
                    }
                }
            } elseif(($_SESSION["nome"]=="thallys" || $_SESSION["nome"]=="thallys@hotmail.com") && $_SESSION["senha"]=="1206"){
                $arquivo = "../arquivos-txt/clientes_Thallys.txt";
                $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);
            }
        }
    }




?>