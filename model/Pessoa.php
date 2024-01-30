<?php

class Pessoa{
    private $idPessoa;
    private $nome;
    private $email;
    private $dataNascimento;

    public function getIdPessoa(){
        return $this->idPessoa;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }
}

?>