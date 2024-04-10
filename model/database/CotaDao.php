<?php 

class CotaDao extends Dao{

    public function getCotaByName($tipoCota){
        $sql = "SELECT idCota FROM cota WHERE tipoCota = ?";
        $this->setParams($tipoCota);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }
    public function insertCota($tipoCota){
        $sql = "INSERT INTO cota(tipoCota) VALUES(?)";
        $this->setParams($tipoCota);
        $this->execute($sql);
        return $this->getStmtId();
    }

    public function insertEgressoCota($idEgresso, $idCota){
        $sql = "INSERT INTO egresso_cota(idEgresso, idCota) VALUES(?, ?)";
        $this->setParams($idEgresso);
        $this->setParams($idCota);
        $this->execute($sql);
        return $this->getStmtId();
    }

}

?>