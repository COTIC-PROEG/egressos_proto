<?php

class Configuracao{
    private $server = "localhost/egressos";
    private $user = "root";
    private $dataBase = "egressos";
    private $port = "127.0.0.1";
    private $password = "";


    public function getHostAplication() {
		return 'http://'.$this->server.'/';
	}

    public function getUser() {
		return $this->user;
	}

    public function getServer() {
		return $this->server;
	}

    public function getDns() {
		return 'mysql:host='.$this->port.';dbname='.$this->dataBase;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getDataBase() {
		return $this->dataBase;
	}

	public function getport() {
		return $this->port;
	}
}

?>