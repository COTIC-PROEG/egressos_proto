<?php

class Cota{
    private int $idCota;
    private string $tipoCota;

    public function getIdCota(): int{
        return $this->idCota;
    }

    public function getTipoBolsa(): string{
        return $this->tipoCota;
    }

    public function setTipoCota($tipoCota){
        $this->tipoCota = $tipoCota;
    }
}

?>