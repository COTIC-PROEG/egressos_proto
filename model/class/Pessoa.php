<?php

class Pessoa{
    private int $idPessoa;
    private string $nome;
    private string $cpf;
    private string $email;
    private DateTime $dataNascimento;
    private Genero $genero;
    private Etnia $etnia;
    private String $faixaEtaria;

    function __construct($nome, $cpf, $dataNascimento, $etnia) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->etnia = $etnia;
    }    

    public function getIdPessoa(): int{
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa): void{
        $this->idPessoa = $idPessoa;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function setNome($nome): void{
        $this->nome = $nome;
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

    public function setEmail($email): void{
        $this->email = $email;
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

    public function setEtnia($etnia): void{
        $this->etnia = $etnia;
    }

    public function getGenero(): Genero{
        return $this->genero;
    }

    public function setGenero($genero): void{
        $this->genero = $genero;
    }

    public function getFaixaEtaria(): String{
        return $this->faixaEtaria;
    }

    public function setFaixaEtaria($faixaEtaria): void{
        $this->faixaEtaria = $faixaEtaria;
    }

}

?>