<?php
include_once '../class/Pessoa.php';
class PessoaController{
    public function cadastraPessoa($nome, $cpf, $email, $dataNascimento){
        $pessoa = new Pessoa($nome, $cpf, $email, $dataNascimento);
    }
}

?>