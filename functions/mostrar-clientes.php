<?php 
    function mostrarClientes(){
        if(($_SESSION["nome"]=="soares" || $_SESSION["nome"]=="soares@gmail.com") && $_SESSION["senha"]=="alinetja"){
            $arquivo = "../arquivos-txt/clientes_Soares.txt";

            if(!file_exists($arquivo)){
                echo "<p>Você não possui nenhum cliente cadastro.</p>";
            } else{
                $fp = fopen($arquivo, "r");
                
                echo "<p>Estes são seus clientes</p>";
                while(!feof($fp)){
                    
                    $valor = fgets($fp, 4096);

                    echo "<ul>
                            <li>$valor</li>
                        </ul>";
                    
                    
                }
                
                
                fclose($fp);



            }
        } elseif(($_SESSION["nome"]=="thallys" || $_SESSION["nome"]=="thallys@hotmail.com") && $_SESSION["senha"]=="1206"){
            $arquivo = "../arquivos-txt/clientes_Thallys.txt";

            if(!file_exists($arquivo)){
                echo "<p>Você não possui nenhum cliente cadastro.</p>";
            } else{
                $fp = fopen($arquivo, "r");
                
                echo "<p>Estes são seus clientes</p>";
                while(!feof($fp)){
                    $valor = fgets($fp, 4096);
                    $nValor = str_replace(".", " ", $valor);
                    echo "<ul>
                        <li>$nValor</li>
                    </ul>";
                }
                
                
                fclose($fp);
            }
        } else{
            echo "<p>Não foi possivel mostrar algo</p>";
        } 
}





?>