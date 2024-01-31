<?php

class Ingresso{
    private int $idIngresso;
    private string $tipo;

    public function getIdIngresso(): int{
        return $this->idIngresso;
    }

    public function getTipoIngresso(): string{
        return $this->tipo;
    }
}

?>