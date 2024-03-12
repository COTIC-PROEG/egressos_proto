<?php

include_once 'AbstractDao.php';
class Dao extends AbstractDao{

    function __construct() {
        parent::__construct();
    }

    public function execute($sql){ 
        $this->openConnection();
        $this->prepareStmt($sql);
        return $this->executeQuery();
	}

    private function close(){
        $this->stmt->close();
        $this->closeConection();
    }

    public function getStmtId(){
        $id = $this->conexaoMySql->getConexao()->insert_id;
        $this->close();
        return $id;
    }

    public function getId(){
        $rows = $this->conexaoMySql->getConexao()->query();
    }

    public function get(){
        $this->conexaoMySql->queryConexao($this->sql);
    }

}

?>