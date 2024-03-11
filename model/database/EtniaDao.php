<?php

include_once '../../model/class/Etnia.php';
class EtniaDao extends AbstractDao{

    public function getEtniaDao($etnia){
        $sql = "SELECT * FROM etnia WHERE tipo = ?";
        $this->setParams($etnia->getTipoEtnia());
        return $this->execute($sql);
    }

    public function insertEtnia($etnia){
        $sql = "INSERT INTO etnia(tipo) VALUES(?)";
        $this->setParams($etnia->getTipoEtnia());
        return $this->execute($sql);
    }

    public function get(){}
}

?>