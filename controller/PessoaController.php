<?php
// include_once '../model/FromJson.php';
include_once '../../model/class/Pessoa.php';

class PessoaController{
    
    public function cadastraPessoa(Pessoa $pessoa){
        $pessoa->setCpf($this->formataCPF($pessoa->getCpf()));
        $pessoa->setDataNascimento($this->formataDataParaSql($pessoa->getDataNascimento()));
        
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

    private function formataDataParaSql(DateTime $data){
        $formato = 'Y-m-d';
        $data = $data->format('Y-m-d');
        $data = DateTime::createFromFormat($formato, $data);
        echo var_dump($data);
        return $data;
    }

    private function formataData($data){
        $formato = 'd/m/Y';
        $dataFormatada = DateTime::createFromFormat($formato, $data);
        return $dataFormatada;
    }

}

?>