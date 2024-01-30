<?php

abstract class Pessoa{
    private $idPessoa;
    private $nome;
    private $email;
    private $dataNascimento;
    private Genero $genero;
    private Etnia $etnia;

    function __construct($nome, $email, $dataNascimento, $etnia){
        $this->nome = $nome;
        $this->email = $email;
        $this->dataNascimento = $dataNascimento;
        $this->etnia = $etnia;
    }

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

    public function getEtnia(){
        return $this->etnia;
    }

    public function getGenero(){
        return $this->genero;
    }

}

?>