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

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
}

?>