<?php
include_once 'AbstractDao.php';
#include_once '../class/Pessoa.php';
class PessoaDao extends AbstractDao{

    public function insertPessoa(Pessoa $pessoa){
        $sql = "INSERT INTO pessoa(nome, cpf, dataNascimento) VALUES(?, ?, ?)";
        $this->setParams($pessoa->getNome());
        $this->setParams($pessoa->getCpf());
        $this->setParams($pessoa->getDataNascimento()->format('Y-m-d'));

        $result = $this->executeSql($sql);
        if($result){
            echo "Pessoa cadastrada com sucesso!";
        }else{
            echo "Erro ao cadastrar pessoa!";
        }
    }

    public function get(){}
}

?>