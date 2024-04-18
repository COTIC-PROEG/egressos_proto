<?php

include_once 'AbstractDao.php';
class Dao extends AbstractDao{

    function __construct() {
        parent::__construct();
    }

    

    public function close(){
        $this->stmt->close();
        $this->closeConection();
    }

    public function getConection(){
        $this->openConnection();
    }

    public function beginTransaction(){
        $this->conexaoMySql->getConexao()->begin_transaction();
    }

    
    public function commit(){
        $this->conexaoMySql->getConexao()->commit();
        $this->close();
    }

    public function rollback(){
        $this->conexaoMySql->getConexao()->rollback();
        $this->close();
    }
}

?>