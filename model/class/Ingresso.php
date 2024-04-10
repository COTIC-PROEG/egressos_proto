<?php

class Ingresso{
    private int $idIngresso;
    private string $nome;

    public function getIdIngresso(): int{
        return $this->idIngresso;
    }

    public function getTipoIngresso(): string{
        return $this->nome;
    }

    public function setTipoIngresso($nome){
        $this->nome = $nome;
    }
}

?>