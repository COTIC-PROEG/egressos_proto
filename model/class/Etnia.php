<?php

class Etnia{
    private int $idEtnia;
    private string $etnia;

    function __construct($etnia){
        $this->etnia = $etnia;
    }

    public function getIdEtnia(): int{
        return $this->idEtnia;
    }
    
    public function getTipoEtnia(): string{
        return $this->etnia;
    }

}

?>