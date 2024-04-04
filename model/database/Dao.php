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

    public function close(){
        $this->stmt->close();
        $this->closeConection();
    }

    public function getStmtId(){
        $id = $this->conexaoMySql->getConexao()->insert_id;
        $this->close();
        return $id;
    }

}

?>