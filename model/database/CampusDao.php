<?php

class CampusDao extends Dao{

    public function getCampusByName($campus){
        $this->getConection();
        $sql = "SELECT idCampus FROM campus WHERE nome = ?";
        $this->setParams($campus);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertCampus($campus){
        $this->getConection();
        $sql = "INSERT INTO campus(nome) VALUES(?)";
        $this->setParams($campus);
        $this->execute($sql);
        return $this->getStmtId(); 
    }

    public function getCampusById($idCampus){
        $this->getConection();
        $sql = "SELECT nome FROM campus WHERE idCampus = ?";
        $this->setParams($idCampus);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $rows = $this->get($result);
        foreach($rows as $row){
            $nome = $row['nome'];
        }
        $this->close();
        return $nome;
    }
}

?>