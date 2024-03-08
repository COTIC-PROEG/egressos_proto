<?php

include_once '../../model/interfaces/IDao.php';
include_once '../../config/Configuracao.php';
include_once '../../model/connection/ConexaoMySql.php';
include_once '../../model/error/ExeptionParameters.php';
abstract class AbstractDao implements IDao{
    private $config;
    private $conexaoMySql;
    protected $sql;
    private $stmt;
    private $parameters = array();

    public function __construct(){
        $this->config = new Configuracao();
        $this->conexaoMySql = new ConexaoMySql($this->config->getServer(), 
        $this->config->getUser(), 
        $this->config->getPassword(), 
        $this->config->getDataBase());
    }

    public function getConexaoMySql(){
        return $this->conexaoMySql;
    }

    public function getDaoMySql(){
		return $this->conexaoMySql;
	}

    private function openConnection(){
        try {
            $this->conexaoMySql->open();
        }
        catch (RuntimeException $e){
            echo $e->getMessage();
        }
    }

    private function closeConection(){
        try {
            $this->conexaoMySql->close();
        }
        catch (RuntimeException $e){
            echo $e->getMessage();
        }
    }

    private function executeStmt($sql){
        $this->stmt = $this->conexaoMySql->getConexao()->prepare($sql);
        return $this->stmtTypes();
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
        return $this->blindParams($types);
    }

    private function blindParams($types){
        if(mb_strlen($types, 'UTF-8') != count($this->parameters)){
            throw new ExeptionParameters("O número de parametros não é igual ao encode de seus tipos");
        }
        if(empty($this->parameters)){
            throw new ExeptionParameters("Não há parametros registrados");
        }
        $this->stmt->bind_param($types, ...$this->parameters);
        $result = $this->stmt->execute();
        $this->stmt->close();
        return $result;
    }

    public function executeSql($sql){
        $this->openConnection();
        $result = $this->executeStmt($sql);
        $this->closeConection();
        return $result;
    }

    public function setParams($param){
        $this->parameters[] = $param;
    }


}

?>