<?php
include_once '../../model/utils/FromJson.php';
include_once '../../model/database/EgressoDao.php';
include_once 'PessoaController.php';
include_once 'IngressoController.php';
include_once 'CursoController.php';
include_once 'InstitutoController.php';
include_once 'CampusController.php';


class EgressoController extends PessoaController{
    #private final string $newURL = 'http://localhost/egressos_web/view/pages/formularioEgresso';
    public function cadastrarEgresso(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['cpf']) && isset($_POST['dataNascimento'])){
                $cpf = $_POST['cpf'];
                $dataNascimento = $_POST['dataNascimento'];
                $status = FromJson::getUltimaMatricula($cpf);
                if($status == 200){
                    $egresso = FromJson::getEgressoFromJson();
                    $pessoa = $egresso->getPessoaEgresso();
                    $egressoDao = new EgressoDao();
                    $ingressoController = new IngressoController();
                    $idPessoa = $this->cadastraPessoa($pessoa);
                    $idEgresso = $egressoDao->insertDadosEgressos($idPessoa, $egresso->getAnoIngresso(), $egresso->getAnoFormatura());
                    $ingressoController->cadastraFormaIngresso($idEgresso, FromJson::getFormaIngresso());
                    $this->cadastraCursoEgresso($idEgresso, FromJson::getCurso(), FromJson::getCodigoCurso(), FromJson::getUnidadeAcademica(), FromJson::getCampus());
                }
            }
        }

    }

    public function cadastraCursoEgresso($idEgresso, $curso, $codCurso, $instituto, $campus){
        $cursoController = new CursoController();
        $institutoController = new InstitutoController();
        $campusController = new CampusController();
        $egressoDao = new EgressoDao();
        $idCurso = $cursoController->cadastraCurso($curso);
        $idInstituto = $institutoController->cadastraInstituto($instituto);
        $idCampus = $campusController->cadastraCampus($campus);
        $idGraduacao = $egressoDao->searchGraduacaoByCodigo($codCurso);
        if($idGraduacao != null){
            $egressoDao->insertGraduacaoEgresso($idEgresso, $idGraduacao);
        }else{
            $novoIdGraduacao = $egressoDao->insertGraduacao( $idCurso, $codCurso, $idInstituto, $idCampus);
            $egressoDao->insertGraduacaoEgresso($idEgresso, $novoIdGraduacao);
        }
        $newURL = 'http://localhost/egressos_web/view/pages/formularioEgresso.';
        header("Location: ".$newURL."php");
        die();
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