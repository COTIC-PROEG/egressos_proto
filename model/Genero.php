<?php

class Genero{
    private int $idGenero;
    private string $tipo;

    public function getIdGenero(): int{
        return $this->idGenero;
    }

    public function getTipoGenero(): string{
        return $this->tipo;
    }
}

?>