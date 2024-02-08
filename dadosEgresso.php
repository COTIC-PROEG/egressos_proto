<?php
function dataDiferenca($dataNascimento = NULL)
{
    if (isset($dataNascimento))
    {
        $tempo = new DateTime(date('Y-m-d', time()));
        
        $dataNascimento = new DateTime($dataNascimento);
        $idade = $tempo->diff($dataNascimento)->format('%y');

        return $idade;

    }

}

function verificarFaixaEtaria($idade = NULL)
{
    if ($idade <= 22) {
        $faixaEtaria = 'Até 22 anos';
    } elseif ($idade >= 23 && $idade <= 29) {
        $faixaEtaria = 'De 23 a 29 anos';
    } elseif ($idade >= 30 && $idade <= 36) {
        $faixaEtaria = 'De 30 a 36 anos';
    } else {
        $faixaEtaria = 'Acima de 36 anos';
    }
    return $faixaEtaria;
}

function getDadosEgressoFromDatabase($cpf = NULL) 
{
    if (isset($cpf)) 
    { //LOCALHOST
        $servername = "servidor";
        $username = "d";
        $password = "";
        $dbname = "egressos";
        
      //PRODUÇÃO
        //$servername = "localhost";
        //$username = "egressos";
        //$password = "Wt9ltlkqdody0yJ";
        //$dbname = "egressos";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        //$sql = "select * from egresso where cpf = '" . $cpf . "'";
        $cpf = ltrim($cpf, '0');
        $sql = "select * from pessoa where cpf = '" . $cpf . "'";
        
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        $result = $conn->query($sql)->fetch_assoc();
        
        $conn->close();
        
        return $result;
       
        
        
    }

}

function getDadosEgressoJson()
{
    if (isset($_SESSION['cpf']))
    {
        $url = 'https://sagitta.ufpa.br/sagitta/ws/consultaegresso/' . $_SESSION['cpf'] . '?login=diegolisboa';
        $json = json_decode(file_get_contents($url));
        
        if ($json)
        {
            $ultimoAnoIngresso = 0;
            foreach ($json as $matricula)
            {
                if ($matricula->anoFormatura > $ultimoAnoIngresso)
                {
                    $ultimaMatricula = $matricula;
                    $ultimoAnoIngresso = $matricula->anoFormatura;
                    
                }
                
            }
            return $ultimaMatricula;
            
        }
        
    }
    
}

function definirDadosSessao()
{
    session_start();

    if (isset($_POST['cpf']) && isset($_POST['dataNascimento']))
    {
        $_SESSION['cpf'] = ltrim($_POST['cpf'], '0');

        $ultimaMatricula = getDadosEgressoJson();
        
        if (isset($ultimaMatricula)) 
        {      
                      
            $_SESSION['dataNascimento'] = $ultimaMatricula->dataNascimento;
            $_SESSION['idade'] = dataDiferenca(str_replace('/', '-', ($ultimaMatricula->dataNascimento[6].$ultimaMatricula->dataNascimento[7].$ultimaMatricula->dataNascimento[8].$ultimaMatricula->dataNascimento[9].$ultimaMatricula->dataNascimento[5].$ultimaMatricula->dataNascimento[3].$ultimaMatricula->dataNascimento[4].$ultimaMatricula->dataNascimento[2].$ultimaMatricula->dataNascimento[0].$ultimaMatricula->dataNascimento[1])));
            $_SESSION['faixaEtaria'] = verificarFaixaEtaria($_SESSION['idade']);
            $_SESSION['nome'] = $ultimaMatricula->nome;
            $_SESSION['anoIngresso'] = $ultimaMatricula->anoIngresso;
            $_SESSION['curso'] = $ultimaMatricula->curso;
            $_SESSION['campus'] = $ultimaMatricula->campus;
            $_SESSION['cor'] = $ultimaMatricula->raca;
            $_SESSION['unidadeAcademica'] = $ultimaMatricula->unidadeAcademica;
            $_SESSION['anoFormatura'] = $ultimaMatricula->anoFormatura;
            $_SESSION['cota'] = $ultimaMatricula->cota;
            $_SESSION['formaIngresso'] = $ultimaMatricula->formaIngresso;
            
            

        }

    }

}

function seletorRedirecionamento() 
{
    if (isset($_POST['cpf']) && isset($_POST['dataNascimento']))
    {
        $resultadoData = validarDataNascimento($_POST['dataNascimento'],$_POST['cpf']);
        $ultimaMatricula = getDadosEgressoJson();
        $resultadoConsulta = getDadosEgressoFromDatabase($_POST['cpf']);        
        
        
        
        if ($resultadoConsulta && $resultadoData==true)   
        {
            
            echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
            die();

        }
        else 
        {
            $transformData = str_replace('-', '/', ($_POST['dataNascimento'][8].$_POST['dataNascimento'][9].$_POST['dataNascimento'][7].$_POST['dataNascimento'][5].$_POST['dataNascimento'][6].$_POST['dataNascimento'][4].$_POST['dataNascimento'][0].$_POST['dataNascimento'][1].$_POST['dataNascimento'][2].$_POST['dataNascimento'][3]));
            
            if (getDadosEgressoJson() && $_SESSION['nome']<>NULL && ($ultimaMatricula->dataNascimento==$transformData))
            {
                $_SESSION['dataNascimento'] = str_replace('/', '-', ($_SESSION['dataNascimento'][6].$_SESSION['dataNascimento'][7].$_SESSION['dataNascimento'][8].$_SESSION['dataNascimento'][9].$_SESSION['dataNascimento'][5].$_SESSION['dataNascimento'][3].$_SESSION['dataNascimento'][4].$_SESSION['dataNascimento'][2].$_SESSION['dataNascimento'][0].$_SESSION['dataNascimento'][1]));
                date_default_timezone_set('America/Belem');
                $_SESSION['dataResposta']=date("Y-m-d");
                echo "<meta http-equiv='refresh' content='0;url=formularioEgresso.php'>";
                
                die();

            }
            else 
            {
                session_destroy();
                 echo "<script>alert('Egresso não encontrado');</script>";
            }

        }
    
    }
    
}

function validarDataNascimento($dataInserida, $cpf) {
    // Consulta a data de nascimento no banco de dados
    $dadosEgresso = getDadosEgressoFromDatabase($cpf);
    
    if ($dadosEgresso) {
        $dataNascimentoCPF = $dadosEgresso['dataNascimento']; // Aqui seria a data de nascimento associada ao CPF
        // Convertendo as datas para objetos DateTime
        $dataNascimentoUsuario = $dataInserida;
        
        // Comparando as datas
        if ($dataNascimentoUsuario == $dataNascimentoCPF) {
            return true;
        } else {
            // Você pode escolher o comportamento desejado aqui, como exibir uma mensagem de erro
            return false; // Retorna falso se a data for inválida
        }
    } else {
        // Caso não encontre o egresso no banco de dados
        return false;
    }
}
