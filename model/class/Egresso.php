<?php
include_once 'Pessoa.php';
class Egresso extends Pessoa{
    private int $idEgresso;
    private string $anoIngresso;
    private string $anoFormatura;
    private Ingresso $ingresso;
    private Cota $cota;
    private array $bolsas;
    private array $atividades;

    function __construct($nome, $cpf, $dataNascimento, $etnia, $anoIngresso, $anoFormatura) {
        parent::__construct($nome, $cpf, $dataNascimento, $etnia);
        $this->anoIngresso = $anoIngresso;
        $this->anoFormatura = $anoFormatura;
    }

    public function getIdEgresso(): int{
        return $this->idEgresso;
    }

    public function setIdEgresso($idEgresso): void{
        $this->idEgresso = $idEgresso;
    }

    public function getAnoIngresso(): string{
        return $this->anoIngresso;
    }

    public function getAnoFormatura(): string{
        return $this->anoFormatura;
    }

    public function getIngresso(): Ingresso{
        return $this->ingresso;
    }

    public function setIngresso($ingresso): void{
        $this->ingresso = $ingresso;
    }

    public function getBolsas(): array{
        return $this->bolsas;
    }

    public function getAtividades(): array{
        return $this->atividades;
    }

    public function getCota(): Cota{
        return $this->cota;
    }

    public function setCota($cota): void{
        $this->cota = $cota;
    }
    
}

?>