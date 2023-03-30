<?php 

    function atualizarDados(){
        if(($_SESSION["nome"]=="soares" || $_SESSION["nome"]=="soares@gmail.com") && $_SESSION["senha"]=="alinetja"){
            $arquivo = "../arquivos-txt/clientes_Soares.txt";

            $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

            if(isset($_POST["newNome"])){
                $newNome = $_POST["newNome"];
                $antClient = $_POST["antClient"];

                $string = implode(" ",$clients); 
                $newString = explode(" ", $string);

                
                $key = array_search($antClient, $newString);
                
                if($key !== false){
                    $newString[$key] = $newNome;
                    echo "<p>Nome modificado com sucesso!!</p>";
                } else{
                    echo "<p>Não foi possivel encontrar o cliente $antClient na sua base de dados.</p>";
                }
                
                $newString = implode(" ", $newString);                
                unlink($arquivo);

                $fp = fopen($arquivo, "a+");

                fwrite($fp, $newString);
                fclose($fp);


            }elseif(isset($_POST["newEmp"])){
                $newEmp = $_POST["newEmp"];
                $antEmp = $_POST["antEmp"];

                $string = implode(" ",$clients); 
                $newString = explode(" ", $string);

                
                $key = array_search($antEmp, $newString);
                
                if($key !== false){
                    $newString[$key] = $newEmp;
                    echo "<p>Empresa modificada com sucesso!!</p>";
                } else{
                    echo "<p>Não foi possivel encontrar a empresa $antEmp na sua base de dados.</p>";
                }
                
                $newString = implode(" ", $newString);             
                unlink($arquivo);

                $fp = fopen($arquivo, "a+");

                fwrite($fp, $newString);
                fclose($fp);


            }

        }elseif(($_SESSION["nome"]=="thallys" || $_SESSION["nome"]=="thallys@hotmail.com") && $_SESSION["senha"]=="1206"){
            $arquivo = "../arquivos-txt/clientes_Thallys.txt";

            $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

            if(isset($_POST["newNome"])){
                $newNome = $_POST["newNome"];
                $antClient = $_POST["antClient"];

                //trasnformando o array em string
                $string = implode(" ",$clients); 

                //transformando a string em array
                $newString = explode(" ", $string);

                
                $key = array_search($antClient, $newString);
                
                if($key !== false){
                    $newString[$key] = $newNome;
                    echo "<p>Nome modificado com sucesso!!</p>";
                } else{
                    echo "<p>Não foi possivel encontrar o cliente $antClient na sua base de dados.</p>";
                }
                
                $newString = implode(" ", $newString);                
                unlink($arquivo);

                $fp = fopen($arquivo, "a+");

                fwrite($fp, $newString);
                fclose($fp);


            }elseif(isset($_POST["newEmp"])){
                $newEmp = $_POST["newEmp"];
                $antEmp = $_POST["antEmp"];

                $string = implode(" ",$clients); 
                $newString = explode(" ", $string);

                
                $key = array_search($antEmp, $newString);
                
                if($key !== false){
                    $newString[$key] = $newEmp;
                    echo "<p>Empresa modificada com sucesso!!</p>";
                } else{
                    echo "<p>Não foi possivel encontrar a empresa $antEmp na sua base de dados.</p>";
                }
                
                $newString = implode(" ", $newString);             
                unlink($arquivo);

                $fp = fopen($arquivo, "a+");

                fwrite($fp, $newString);
                fclose($fp);


            }
        }
    }





?>