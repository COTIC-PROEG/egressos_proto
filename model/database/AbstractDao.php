<?php

include_once '../../model/interfaces/IDao.php';
include_once '../../config/Configuracao.php';
include_once '../../model/connection/ConexaoMySql.php';
include_once '../../model/error/ExeptionParameters.php';
abstract class AbstractDao implements IDao{
    private $config;
    protected $conexaoMySql;
    protected $sql;
    protected $stmt;
    private $parameters = array();

    public function __construct(){
        $this->config = new Configuracao();
        $this->conexaoMySql = new ConexaoMySql($this->config->getServer(), 
        $this->config->getUser(), 
        $this->config->getPassword(), 
        $this->config->getDataBase());
    }

    protected function openConnection(){
        try {
            $this->conexaoMySql->open();
        }
        catch (RuntimeException $e){
            echo $e->getMessage();
        }
    }

    protected function closeConection(){
        try {
            $this->conexaoMySql->close();
        }
        catch (RuntimeException $e){
            echo $e->getMessage();
        }
    }

    protected function executeQuery(){
        if (!$this->stmt){
			throw new ExeptionParameters("Não há stmt");
        }
        return $this->executeStmt();
    }

    private function executeStmt(){
        return  $this->stmt->execute();		
    }

    protected function prepareStmt($sql){
        $this->sql = $sql;
        $this->stmt = $this->conexaoMySql->getConexao()->prepare($this->sql);
        $this->stmtTypes();
    }

    private function stmtTypes(){
        $types = '';
        foreach($this->parameters as $param){
            if(is_int($param)){
                $types .= 'i';
            }elseif(is_string($param)){
                $types .= 's';
            }elseif(is_double($param)){
                $types .= 'd';
            }else{
                $types .= 'b';
            }
        }
        $this->blindParams($types);
    }

    private function blindParams($types){
        if(mb_strlen($types, 'UTF-8') != count($this->parameters)){
            throw new ExeptionParameters("O número de parametros não é igual ao encode de seus tipos");
        }
        if(empty($this->parameters)){
            throw new ExeptionParameters("Não há parametros registrados");
        }
        $this->stmt->bind_param($types, ...$this->parameters);
        unset($this->parameters);
    } 

    public function setParams($param){
        $this->parameters[] = $param;
    }

    protected function closeStmt() {
        if (!$this->stmt){
			throw new ExeptionParameters("Não há stmt");
        }
        $this->stmt->close();
    }

    protected function getId($result){
        $rows = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                $rows[] = $r;
            }
        }
        if($rows){
            return $rows[0];
        }
        return null;
    }

    protected function get($result){
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        if($rows){
            return $rows;
        }
        return null;
    }

    public function getStmtId(){
        return $this->conexaoMySql->getConexao()->insert_id;
    }

    public function execute($sql){ 
        $this->prepareStmt($sql);
        return $this->executeQuery();
	}

    public function query($sql){
        $stmt = $this->conexaoMySql->getConexao()->query($sql);
        $rows = array();
        while ($row = $stmt->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                $rows[] = $r;
            }
        }
        if($rows){
            return $rows;
        }
        return null;
    }

}

?>