<?php
include_once 'AbstractDao.php';
#include_once '../class/Pessoa.php';
class PessoaDao extends AbstractDao{
    public function insertPessoa(Pessoa $pessoa){
        $conn = $this->getConexaoMySql();
        try{
            $conn->open();
            echo var_dump($pessoa->getNome(), $pessoa->getCpf(), $pessoa->getDataNascimento()->format('Y-m-d'));
            $sql = "INSERT INTO pessoa (nome, cpf, dataNascimento)
            VALUES ({$pessoa->getNome()}, {$pessoa->getCpf()}, {$pessoa->getDataNascimento()->format('Y-m-d')});";
            $conn->getConexao()->query($sql);
            $conn->close();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function get(){}
}

?>