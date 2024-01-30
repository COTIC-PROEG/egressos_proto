<?php

class Egresso extends Pessoa{
    private int $idEgresso;
    private DateTime $anoIngresso;
    private DateTime $anoFormatura;
    private Ingresso $ingresso;
    private array $bolsas;
    private array $atividades;

    function __construct($nome, $email, $dataNascimento, $etnia) {
        parent::__construct($nome, $email, $dataNascimento, $etnia);
    }

    public function getIdEgresso(): int{
        return $this->idEgresso;
    }

    public function getAnoIngresso(): DateTime{
        return $this->anoIngresso;
    }

    public function getAnoFormatura(): DateTime{
        return $this->anoFormatura;
    }

    public function getIngresso(): Ingresso{
        return $this->ingresso;
    }

    public function getBolsas(): array{
        return $this->bolsas;
    }

    public function getAtividades(): array{
        return $this->atividades;
    }
    
}

?>