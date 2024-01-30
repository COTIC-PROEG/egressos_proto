<?php

interface IConexao{
    public function open($nameServer, $userName, $password, $nameDataBase);
    public function close();
}
?>