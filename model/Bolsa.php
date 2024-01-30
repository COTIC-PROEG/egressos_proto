<?php

class Bolsa{
    private int $idBolsa;
    private string $tipo;

    public function getIdBolsa(): int{
        return $this->idBolsa;
    }

    public function getTipoBolsa(): string{
        return $this->tipo;
    }
}

?>