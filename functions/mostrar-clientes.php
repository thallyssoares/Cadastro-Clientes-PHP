<?php 
    function mostrarClientes(){
        
            $arquivo = "../arquivos-txt/clientes_". $_SESSION["nome"]. ".txt";

            //verifica se o arquivo existe, se existir mostra os valores no arquivo
            //senão, mostra uma mensagem de erro
            if(!file_exists($arquivo)){
                echo "<p>Você não possui nenhum cliente cadastrado.</p>";
            } else{
                $fp = fopen($arquivo, "r");
                
                echo "<p>Estes são seus clientes:</p>";
                while(!feof($fp)){
                    
                    $valor = fgets($fp, 4096);

                    echo '<ul class="mostClient">
                            <li>'. $valor . '</li>
                        </ul>';
                    
                    
                }
                
                
                fclose($fp);
            }


}





?>