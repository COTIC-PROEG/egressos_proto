<?php

class Configuracao{
    private $hostServer = "localhost/egressos";
    private $userDataBase = "root";
    private $nameDataBase = "egressos";
    private $hostDataBase = "127.0.0.1";
    private $passwordDatabase = "";


    public function getHostAplication() {
		return 'http://'.$this->hostServer.'/';
	}

    public function getUserDataBase() {
		return $this->userDataBase;
	}

    public function getHostServer() {
		return $this->hostServer;
	}

    public function getDns() {
		return 'mysql:host='.$this->hostDataBase.';dbname='.$this->nameDataBase;
	}

	public function getPasswordDataBase() {
		return $this->passwordDataBase;
	}

	public function getNameDataBase() {
		return $this->nameDataBase;
	}

	public function getHostDataBase() {
		return $this->hostDataBase;
	}

	public function getDebug() {
		return $this->debug;
	}
}

?>