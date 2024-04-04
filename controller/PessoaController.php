<?php
// include_once '../model/FromJson.php';
include_once '../../model/class/Pessoa.php';
include_once '../../model/database/PessoaDao.php';
include_once 'EtniaController.php';

class PessoaController{
    
    protected function cadastraPessoa($pessoa){
        $etniaController = new EtniaController();
        $pessoa->setCpf($this->formataCPF($pessoa->getCpf()));
        //$pessoa->setDataNascimento($this->formataDataParaSql($pessoa->getDataNascimento()));
        $pessoaDao = new PessoaDao();
        $idNovaPessoa = $pessoaDao->insertPessoa($pessoa);
        $etniaController->cadastraEtniaPessoa($idNovaPessoa, $pessoa->getEtnia());
        return $idNovaPessoa;
    }

    private function formataCPF(string $cpf){
        if(strlen($cpf) != 11){
            $zeros = 11 - strlen($cpf);
            for($i = 0; $i < $zeros; $i++){
                $cpf = '0'.$cpf;
            }
        }
        return $cpf;
    }

    protected function formataDataParaSql(DateTime $data){
        $formato = 'Y-m-d';
        $data = $data->format('Y-m-d');
        $data = DateTime::createFromFormat($formato, $data);
        return $data;
    }

    private function formataData($data){
        $formato = 'd/m/Y';
        $dataFormatada = DateTime::createFromFormat($formato, $data);
        return $dataFormatada;
    }

}

?>