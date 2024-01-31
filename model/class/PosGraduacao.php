<?php

class PosGraduacao{
    private int $idPosGraduacao;
    private string $tipo;

    public function getIdPosgraduacao(): int{
        return $this->idPosGraduacao;
    }

    public function getPosGraduacao(): string{
        return $this->tipo;
    }
}

?>