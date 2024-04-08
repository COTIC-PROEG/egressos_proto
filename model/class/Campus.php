<?php

class Campus{
    private int $idCampus;
    private string $nome;

    public function getiIdCampus(): int{
        return $this->idCampus;
    }

    public function setIdCampus($idCampus): void{
        $this->idCampus = $idCampus;
    }

    public function getCampus(): string{
        return $this->nome;
    }

    public function setCampus($nome){
        $this->nome = $nome;
    }
}

?>