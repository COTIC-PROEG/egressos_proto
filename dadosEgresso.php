<?php

function destroySession() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
    }
}

function startSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

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

function getDadosEgressoFromDatabase($cpf = NULL) 
{
    if (isset($cpf)) 
    {
        $servername = "servidor";
        $username = "a";
        $password = "";
        $dbname = "egressos";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "select * from egresso where cpf = '" . $cpf . "'";

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
        $url = 'https://sagitta.ufpa.br/sagitta/ws/discente/' . $_SESSION['cpf'] . '?login=rsantsil';
        $json = json_decode(file_get_contents($url));

        if ($json)
        {
            $ultimoAnoIngresso = 0;
            foreach ($json as $matricula) 
            {
                if ($matricula->anoIngresso > $ultimoAnoIngresso) 
                {
                    $ultimaMatricula = $matricula;
                    $ultimoAnoIngresso = $matricula->anoIngresso;

                }

            }
            return $ultimaMatricula;

        }

    }
    
}

function definirDadosSessao()
{
    startSession();

    if (isset($_POST['cpf']))
    {
        $_SESSION['cpf'] = ltrim($_POST['cpf'], '0');

        $ultimaMatricula = getDadosEgressoJson();
        
        if (isset($ultimaMatricula)) 
        {        
            $_SESSION['dataNascimento'] = $ultimaMatricula->dataNascimento;
            $_SESSION['idade'] = dataDiferenca($_SESSION['dataNascimento']);
            $_SESSION['nome'] = $ultimaMatricula->nome;
            $_SESSION['anoIngresso'] = $ultimaMatricula->anoIngresso;
            $_SESSION['curso'] = $ultimaMatricula->curso->nome;
            $_SESSION['campus'] = $ultimaMatricula->curso->campus->nome;
            $_SESSION['email'] = $ultimaMatricula->email;
    
        }
        

    }

}

function seletorRedirecionamento() 
{
    if (isset($_POST['cpf']))
    {
        $resultadoConsulta = getDadosEgressoFromDatabase($_SESSION['cpf']);
        // echo var_dump($_POST['cpf']);

        if (isset($resultadoConsulta)) 
        {
            echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
            die();

        }
        else 
        {
            if (getDadosEgressoJson()) 
            {
                echo "<meta http-equiv='refresh' content='0;url=formularioEgresso.php'>";
                die();

            }
            else 
            {
                destroySession();
                echo "<script>alert('Egresso não encontrado');</script>";
            };

        }
    
    }
    
}

function cpfSecurity()
{
    if(!isset($_SESSION['cpf'])) {
        echo '<script>alert("Acesso indevido: Para ter acesso, é necessário inserir o CPF");</script>';
        echo "<meta http-equiv='refresh' content='0;url=validaCpf.php'>";
        die();
    }
}

function returnButtonSessionDestroy() {
    if(isset($_POST['returnButton'])) {
        startSession();
        destroySession();
        echo "<meta http-equiv='refresh' content='1'";
    }
}