<?php

class CampusDao extends Dao{

    public function getCampusByName($campus){
        $sql = "SELECT idCampus FROM campus WHERE nome = ?";
        $this->setParams($campus);
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

    public function insertCampus($campus){
        $sql = "INSERT INTO campus(nome) VALUES(?)";
        $this->setParams($campus);
        $this->execute($sql);
        return $this->getStmtId(); 
    }
}

?>