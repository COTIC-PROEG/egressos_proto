<?php

class Instituto{
    private int $idInstituto;
    private string $nome;

    public function getIdInstituto(): int{
        return $this->idInstituto;
    }

    public function setIdInstituto($idInstituto): void{
        $this->idInstituto = $idInstituto;
    }

    public function getInstituto(): string{
        return $this->nome;
    }

    public function setInstituto($nome){
        $this->nome = $nome;
    }
}

?>