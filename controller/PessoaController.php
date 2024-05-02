<?php
// include_once '../model/FromJson.php';
include_once '../../model/class/Pessoa.php';
include_once '../../model/database/PessoaDao.php';
include_once 'EtniaController.php';

class PessoaController{
    
    public function cadastraPessoa($pessoa){
        $etniaController = new EtniaController();
        $pessoa->setCpf($this->formataCPF($pessoa->getCpf()));
        $pessoaDao = new PessoaDao();
        $idNovaPessoa = $pessoaDao->insertPessoa($pessoa);
        $etniaController->cadastraEtniaPessoa($idNovaPessoa, $pessoa->getEtnia());
        $idFaixaEtaria = $this->verificarFaixaEtaria($pessoa->getDataNascimento());
        $pessoaDao->insertFaixaEtariaPessoa($idNovaPessoa, $idFaixaEtaria);
        return $idNovaPessoa;
    }

    private function verificarFaixaEtaria($dataNascimento){
        $dataAtual = new DateTime();
        $idade = $dataAtual->diff($dataNascimento)->format('%y'); 
        if ($idade <= 22) {
            return 1;
        } elseif ($idade <= 29) {
            return 2;
        } elseif ($idade <= 36) {
            return 3;
        } else {
            return 4;
        }
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