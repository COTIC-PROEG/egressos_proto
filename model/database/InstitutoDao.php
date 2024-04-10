<?php

class InstitutoDao extends Dao{

    public function getInstitutoByName($instituto){
        $sql = "SELECT idInstituto FROM instituto WHERE nome = ?";
        $this->setParams($instituto);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertInstituto($instituto){
        $sql = "INSERT INTO instituto(nome) VALUES(?)";
        $this->setParams($instituto);
        $this->execute($sql);
        return $this->getStmtId(); 
    }

    public function getInstitutoById($idInstituto){
        $sql = "SELECT nome FROM instituto WHERE idInstituto = ?";
        $this->setParams($idInstituto);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $rows = $this->get($result);
        foreach($rows as $row){
            return $row['nome'];
        }
    }
}

?>