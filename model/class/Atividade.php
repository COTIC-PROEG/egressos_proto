<?php

class Atividade{
    private int $idAtividade;
    private string $tipo;

    public function getIdAtividade(): int{
        return $this->idAtividade;
    }

    public function getTipoAtividade(): string{
        return $this->tipo;
    }
}

?>