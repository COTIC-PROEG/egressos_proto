<?php

class Configuracao{
    private $nameServer = "localhost/egressos";
    private $userName = "root";
    private $nameDataBase = "egressos";
    private $hostDataBase = "127.0.0.1";
    private $password = "";


    public function getHostAplication() {
		return 'http://'.$this->nameServer.'/';
	}

    public function getUserDataBase() {
		return $this->userName;
	}

    public function getHostServer() {
		return $this->nameServer;
	}

    public function getDns() {
		return 'mysql:host='.$this->hostDataBase.';dbname='.$this->nameDataBase;
	}

	public function getPasswordDataBase() {
		return $this->password;
	}

	public function getNameDataBase() {
		return $this->nameDataBase;
	}

	public function getHostDataBase() {
		return $this->hostDataBase;
	}
}

?>