<?php

class Pessoa{
    private int $idPessoa;
    private string $nome;
    private string $cpf;
    private string $email;
    private DateTime $dataNascimento;
    private Genero $genero;
    private Etnia $etnia;

    function __construct($nome, $cpf, $dataNascimento, $etnia) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->etnia = $etnia;
    }    

    public function getIdPessoa(): int{
        return $this->idPessoa;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getCpf(): string{
        return $this->cpf;
    }
    public function setCpf($cpf): void{
        $this->cpf = $cpf;
    }

    public function getEmail(): string{
        return $this->email;
    }


    public function getDataNascimento(): DateTime{
        return $this->dataNascimento;
    }

    public function setDataNascimento(DateTime $dataNascimento): void{
        $this->dataNascimento = $dataNascimento;
    }

    public function getEtnia(): Etnia{
        return $this->etnia;
    }

    public function getGenero(): Genero{
        return $this->genero;
    }

}

?>