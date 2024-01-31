<?php
include_once '../interfaces/IDao.php';
include_once '../../config/Configuracao.php';
include_once '../connection/ConexaoMySql.php';
abstract class Dao implements IDao{
    private $config;
    private $mysqlDao;
    public function __construct(){
        $this->config = new Configuracao();
        $this->mysqlDao = new ConexaoMySql($this->config->getServer(), 
        $this->config->getUser(), 
        $this->config->getPassword(), 
        $this->config->getDataBase());
    }

    public function getConexao(){
        return $this->mysqlDao;
    }
}

?>