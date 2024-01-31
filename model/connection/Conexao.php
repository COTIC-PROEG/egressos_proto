<?php
include_once '../interfaces/IConexao.php';
abstract class Conexao implements IConexao{
    private $conexao;
    private string $server;
    private string $user;
    private string $password;
    private string $dataBase;

    public function __construct($server, $user, $password, $dataBase){
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
        $this->dataBase = $dataBase;
    }

    public function getConexao(){
        return $this->conexao;
    }

    public function setConexao(mysqli $conexao){
        $this->conexao = $conexao;
    }

    public function getServer(): string{
        return $this->server;
    }

    public function getUser(): string{
        return $this->user;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getDataBase(): string{
        return $this->dataBase;
    }

}

?>