<?php
include_once '../../model/utils/FromJson.php';
include_once '../../model/database/EgressoDao.php';
include_once 'PessoaController.php';
include_once 'IngressoController.php';
include_once 'CursoController.php';
include_once 'InstitutoController.php';
include_once 'CampusController.php';
include_once 'GraduacaoController.php';


class EgressoController extends PessoaController{
    public function cadastrarEgresso(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['cpf']) && isset($_POST['dataNascimento'])){
                $cpf = $_POST['cpf'];
                $dataNascimento = $_POST['dataNascimento'];
                $status = FromJson::getUltimaMatricula($cpf);
                if($status == 200){
                    $egresso = FromJson::getEgressoFromJson();
                    $egressoDao = new EgressoDao();
                    $ingressoController = new IngressoController();
                    $idPessoa = $this->cadastraPessoa($egresso);
                    $idEgresso = $egressoDao->insertDadosEgressos($idPessoa, $egresso->getAnoIngresso(), $egresso->getAnoFormatura());
                    $ingressoController->cadastraFormaIngresso($idEgresso, FromJson::getFormaIngresso());
                    $this->cadastraCursoEgresso($idEgresso, FromJson::getCurso(), FromJson::getCodigoCurso(), FromJson::getUnidadeAcademica(), FromJson::getCampus());
                    $this->acessarFormulario($idPessoa);
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
    }

    public function carregaDadosEgresso(){
        $idPessoa = $_GET['id'];
        $egressoDao = new EgressoDao();
        return $egressoDao->getDadosEgresso($idPessoa);
    }

    public function acessarFormulario($idPessoa){
        $newURL = 'http://localhost/egressos_web/view/pages/formularioEgresso.';
        header("Location: ".$newURL."php?id=$idPessoa");
        die();
        
    }

    public function getGraduacao($idEgresso){
        $egressoDao = new EgressoDao();
        $graduacaoController = new GraduacaoController();
        $idGraduacao = $egressoDao->getGraduacaoByCodigo($idEgresso);
        return $graduacaoController->getDadosGraduacao($idGraduacao);
    }
}

?>