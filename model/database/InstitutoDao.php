<?php

class InstitutoDao extends Dao{

    public function getInstitutoByName($instituto){
        $sql = "SELECT idInstituto FROM instituto WHERE nome = ?";
        $this->setParams($instituto);
        $this->execute($sql);
        $rows = array();
        $result = $this->stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                $rows[] = $r;
            }
        }
        $this->close();
        if($rows != null){
            return $rows[0];
        }
        return null;
    }

    public function insertInstituto($instituto){
        $sql = "INSERT INTO instituto(nome) VALUES(?)";
        $this->setParams($instituto);
        $this->execute($sql);
        return $this->getStmtId(); 
    }
}

?>