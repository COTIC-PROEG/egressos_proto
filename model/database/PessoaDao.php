<?php
include_once 'AbstractDao.php';
include_once '../../model/class/Pessoa.php';

class PessoaDao extends AbstractDao{

    public function insertPessoa(Pessoa $pessoa){
        $sql = "INSERT INTO pessoa(nome, cpf, dataNascimento) VALUES(?, ?, ?)";
        $this->setParams($pessoa->getNome());
        $this->setParams($pessoa->getCpf());
        $this->setParams($pessoa->getDataNascimento()->format('Y-m-d'));

        $result = $this->execute($sql);
        return $result;

    }

    public function get(){}
}

?>