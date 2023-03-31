<?php 

    function atualizarDados(){


            $arquivo = "../arquivos-txt/clientes_".$_SESSION["nome"].".txt";

            $clients = file($arquivo, FILE_SKIP_EMPTY_LINES);

            //verifica se o cliente quer mudar o nome ou a empresa do cliente

            if(isset($_POST["newNome"])){
                $newNome = $_POST["newNome"];
                $antClient = $_POST["antClient"];

                //transforma o array dos clientes em string
                $string = implode(" ",$clients); 

                //transforma a string em array novamente, mas separado corretamente pra facilitar a validação
                $newString = explode(" ", $string);

                
                $key = array_search($antClient, $newString);

                //procura pelo valor anterior no array
                //se o valor existir ele faz a mudança
                //senao ele diz que não foi possivel achar o cliente
                if($key !== false){
                    $newString[$key] = $newNome;
                    echo "<p>Nome modificado com sucesso!!</p>";

                    //aqui o arquivo é atualizado e reescrito com o novo valor
                    $newString = implode(" ", $newString);                
                    //pra facilitar o trabnalho, resolvi apagar o arquivo e escrever ele novamente
                    unlink($arquivo);

                    $fp = fopen($arquivo, "a+");

                    fwrite($fp, $newString);
                    fclose($fp);

                } else{
                    echo "<p>Não foi possivel encontrar o cliente $antClient na sua base de dados.</p>";
                }
                


            }elseif(isset($_POST["newEmp"])){
                $newEmp = $_POST["newEmp"];
                $antEmp = $_POST["antEmp"];

                //funciona igual a mudança do nome do cliente, mas nesse caso é com o nome da empresa
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





?>