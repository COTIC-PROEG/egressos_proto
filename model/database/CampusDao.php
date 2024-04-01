<?php

class CampusDao extends Dao{

    public function getCampusByName($campus){
        $sql = "SELECT idCampus FROM campus WHERE nome = ?";
        $this->setParams($campus);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertCampus($campus){
        $sql = "INSERT INTO campus(nome) VALUES(?)";
        $this->setParams($campus);
        $this->execute($sql);
        return $this->getStmtId(); 
    }
}

?>