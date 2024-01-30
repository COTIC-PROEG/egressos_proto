<?php

class Egresso extends Pessoa{
    private int $idEgresso;
    private DateTime $anoIngresso;
    private DateTime $anoFormatura;
    private array $bolsa;

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

    public function getBolsa(): array{
        return $this->bolsa;
    }
}

?>