<?php

class Campus{
    private int $idCampus;
    private string $nome;

    public function getIdCampus(): int{
        return $this->idCampus;
    }

    public function setIdCampus($idCampus): void{
        $this->idCampus = $idCampus;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
}

?>