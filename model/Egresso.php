<?php

class Egresso extends Pessoa{
    private $idEgresso;
    private $anoIngresso;
    private $anoFormatura;

    function __construct($nome, $email, $dataNascimento, $etnia) {
        parent::__construct($nome, $email, $dataNascimento, $etnia);
    }

    public function getIdEgresso(){
        return $this->idEgresso;
    }

    public function getAnoIngresso(){
        return $this->anoIngresso;
    }

    public function getAnoFormatura(){
        return $this->anoFormatura;
    }
}

?>