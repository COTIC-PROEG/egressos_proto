<?php
include_once 'Conexao.php';
class ConexaoMySql extends Conexao{

    public function __construct($server, $user, $password, $dataBase) {
        parent::__construct($server, $user, $password, $dataBase);
    }
    public function open(){
        $conn = new mysqli(parent::getServer(), parent::getUser(), parent::getPassword(), parent::getDataBase());
        if ($conn->connect_errno) {
            throw new RuntimeException('Erro ao iniciar uma conexão: ' . $conn->connect_error);
        }
        parent::setConexao($conn);
    }

    public function close(){
        if(!parent::getConexao()){
            throw new RuntimeException('Não há instanciada uma conexão mysql: ' . mysqli_error(parent::getConexao()));
        }
        parent::getConexao()->close();
    }

    public function queryConexao($sql){
        return parent::getConexao()->query($sql);
    }

}

?>