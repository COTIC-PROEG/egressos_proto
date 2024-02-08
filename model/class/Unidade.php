<?php

class Unidade{
    private int $idUnidade;
    private string $tipo;

    public function getIdUnidade(): int{
        return $this->idUnidade;
    }

    public function getUnidade(): string{
        return $this->tipo;
    }
}

?>