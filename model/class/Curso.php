<?php

class Curso{
    private int $idCurso;
    private string $nome;

    public function getIdCurso(): int{
        return $this->idCurso;
    }

    public function setIdCurso($idCurso): void{
        $this->idCurso = $idCurso;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
}

?>