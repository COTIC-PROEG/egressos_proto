<?php
include_once 'Dao.php';
include_once '../../model/class/Pessoa.php';

class PessoaDao extends Dao{

    public function insertPessoa(Pessoa $pessoa){
        $this->getConection();
        $sql = "INSERT INTO pessoa(nome, cpf, dataNascimento) VALUES(?, ?, ?)";
        $this->setParams($pessoa->getNome());
        $this->setParams($pessoa->getCpf());
        $this->setParams($pessoa->getDataNascimento()->format('Y-m-d'));

        $result = $this->execute($sql);
        if($result){
            return $this->getStmtId();   
        }
    }
}

?>