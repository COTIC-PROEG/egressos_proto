<?php
include_once '../../model/utils/FromJson.php';
include_once '../../model/database/EgressoDao.php';
include_once 'PessoaController.php';
include_once 'IngressoController.php';
include_once 'CursoController.php';
include_once 'InstitutoController.php';
include_once 'CampusController.php';
include_once 'GraduacaoController.php';
include_once 'CotaController.php';
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 3));
$dotenv->safeLoad();


class EgressoController extends PessoaController{
    public function cadastrarEgresso(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['cpf']) && isset($_POST['dataNascimento'])){
                $cpf = trim($_POST['cpf']);
                $dataNascimento = $_POST['dataNascimento'];
                $status = FromJson::getUltimaMatricula($cpf);
                $dataNascimentoSagitta = FromJson::stringDataNascimento();
                if($dataNascimentoSagitta != $dataNascimento){
                    echo "<script>alert('Data de nascimento não confere com a data de nascimento do egresso');</script>";
                    return;
                }
                $idPessoa = $this->verificaCadastroByCpf($cpf);
                if($idPessoa == null){
                    if($status == 200){
                        $idPessoa = $this->cadastraInformacoes();
                    }
                }
                $this->acessarFormulario($idPessoa);
            }
        }
    }

    private function cadastraInformacoes(){
        $egresso = FromJson::getEgressoFromJson();
        $egressoDao = new EgressoDao();
        $idPessoa = $egressoDao->cadastraAllInformacoes($egresso);
        return $idPessoa;
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
        $id = $_GET['id'];
        $idPessoa = $this->desmascararId($id);
        $egressoDao = new EgressoDao();
        $ingressoController = new IngressoController();
        $cotaController = new CotaController();
        $egresso = $egressoDao->getDadosEgresso($idPessoa);
        $egresso->setIngresso($ingressoController->getFormaIngresso($egresso->getIdEgresso()));
        $egresso->setCota($cotaController->getCota($egresso->getIdEgresso()));
        return $egresso;

    }

    public function verificaCadastroByCpf($cpf){
        $egressoDao = new EgressoDao();
        return $egressoDao->egressoByCpf($cpf);
    }

    public function acessarFormulario($idPessoa){
        $idCriptografado = $this->mascararId($idPessoa);
        $newURL = 'http://localhost/egressos_web/view/pages/formularioEgresso.';
        header("Location: ".$newURL."php?id=$idCriptografado");
        die();
        
    }

    public function getGraduacao($idEgresso){
        $egressoDao = new EgressoDao();
        $graduacaoController = new GraduacaoController();
        $idGraduacao = $egressoDao->getGraduacaoByCodigo($idEgresso);
        return $graduacaoController->getDadosGraduacao($idGraduacao);
    }

    private function mascararId($id){
        $secret_key = $_ENV['SECRET_KEY'];
        $init_vector = $_ENV['INIT_VECTOR'];
        $cipher = "aes-256-cbc";
        $idCriptografado = openssl_encrypt($id, $cipher, $secret_key, 0, $init_vector);
        return base64_encode($idCriptografado);
    }

    private function desmascararId($idCriptografado){
        $secret_key = $_ENV['SECRET_KEY'];
        $init_vector = $_ENV['INIT_VECTOR'];
        $cipher = "aes-256-cbc";
        $idCriptografado = base64_decode($idCriptografado);
        $id = openssl_decrypt($idCriptografado, $cipher, $secret_key, 0, $init_vector);
        return $id;
    }
}

?>