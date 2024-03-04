<?php
include_once 'AbstractDao.php';
#include_once '../class/Pessoa.php';
class PessoaDao extends AbstractDao{
    public function insertPessoa(Pessoa $pessoa){
        $conn = $this->getConexaoMySql();
        $conn->open();
        $sql = "INSERT INTO pessoa (nome, cpf, email, dataNascimento)
        VALUES ({$pessoa->getNome()}, {$pessoa->getCpf()}, {$pessoa->getEmail()}, {$pessoa->getDataNascimento()});";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}

?>