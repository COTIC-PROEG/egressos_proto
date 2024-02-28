<?php
// include_once '../model/FromJson.php';
include_once '../model/Request.php';
use GuzzleHttp\Client;

class PessoaController{
    public function cadastrarPessoa(){
        $s = file_exists('../model/Request.php');
        echo "teste".$s;
        $request = 1;
        if($request == 'POST'){
            $client = new Client(['base_uri' => 'http://localhost:8000/egressos/']);
            $response = $client->request('POST', 'view/pages/validaCpf.php', [
                'form_params' => [
                    'cpf' => $_POST['cpf'],
                    'dataNascimento' => $_POST['dataNascimento'],
                ]
            ]);

            if($response->getStatusCode() == 200){

            }else if ($response->getStatusCode() == 400){
                echo "<script>alert('Egresso não encontrado na base de dados');</script>";
            }

        }

        // if(isset($_POST['cpf']) && isset($_POST['dataNascimento'])){
        //     FromJson::getultimaMatricula($_POST['cpf']);
        //     $pessoa = FromJson::getPessoaFromJson();
        // }
    }

    public function acessarFormulario(){
        if (isset($_POST['cpf']) && isset($_POST['dataNascimento'])){
            $resultadoData = validarDataNascimento($_POST['dataNascimento'],$_POST['cpf']);
            $ultimaMatricula = getDadosEgressoJson();
            $resultadoConsulta = getDadosEgressoFromDatabase($_POST['cpf']);        
             
            if ($resultadoConsulta && $resultadoData==true){
                echo "<meta http-equiv='refresh' content='0;url=consultaResposta.php'>";
                die();
            }else{
                $transformData = str_replace('-', '/', ($_POST['dataNascimento'][8].$_POST['dataNascimento'][9].$_POST['dataNascimento'][7].$_POST['dataNascimento'][5].$_POST['dataNascimento'][6].$_POST['dataNascimento'][4].$_POST['dataNascimento'][0].$_POST['dataNascimento'][1].$_POST['dataNascimento'][2].$_POST['dataNascimento'][3]));
            }
        // if(getDadosEgressoJson() && $_SESSION['nome'] <> NULL && ($ultimaMatricula->dataNascimento==$transformData){
        //     $_SESSION['dataNascimento'] = str_replace('/', '-', ($_SESSION['dataNascimento'][6].$_SESSION['dataNascimento'][7].$_SESSION['dataNascimento'][8].$_SESSION['dataNascimento'][9].$_SESSION['dataNascimento'][5].$_SESSION['dataNascimento'][3].$_SESSION['dataNascimento'][4].$_SESSION['dataNascimento'][2].$_SESSION['dataNascimento'][0].$_SESSION['dataNascimento'][1]));
        //     date_default_timezone_set('America/Belem');
        //     $_SESSION['dataResposta']=date("Y-m-d");
        //     echo "<meta http-equiv='refresh' content='0;url=formularioEgresso.php'>";
                
        //     die();

        // }else{
        //     session_destroy();
        //     echo "<script>alert('Egresso não encontrado');</script>";
        // }
        }
    }
}

?>