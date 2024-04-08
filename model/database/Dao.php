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

    public function query($sql){
        $this->openConnection();
        $stmt = $this->conexaoMySql->getConexao()->query($sql);
        $rows = array();
        while ($row = $stmt->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                $rows[] = $r;
            }
        }
        $this->closeConection();
        if($rows){
            return $rows;
        }
        return null;
    }

}

?>