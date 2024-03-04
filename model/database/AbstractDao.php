<?php

include_once '../../model/interfaces/IDao.php';
include_once '../../config/Configuracao.php';
include_once '../../model/connection/ConexaoMySql.php';
abstract class AbstractDao implements IDao{
    private $config;
    private $conexaoMySql;
    protected $sql;
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

    public function getDaoMySql()
	{
		return $this->conexaoMySql;
	}

	public function get(){
		return $this->getDaoMySql()->query($this->sql);
    }

}

?>