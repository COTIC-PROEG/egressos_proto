<?php

class Curso{
    private int $idCurso;
    private string $nome;

    public function getIdCurso(): int{
        return $this->idCurso;
    }

    public function getCurso(): string{
        return $this->nome;
    }
}

?>