<?php
include_once 'Dao.php';
class IngressoDao extends Dao{
    public function getFormaIngresso($tipoIngresso){
        $this->getConection();
        $sql = "SELECT idIngresso FROM ingresso WHERE forma = ?";
        $this->setParams($tipoIngresso);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertFormaIngresso($tipoIngresso){
        $this->getConection();
        $sql = "INSERT INTO ingresso(forma) VALUES(?)";
        $this->setParams($tipoIngresso);
        $this->execute($sql);
        return $this->getStmtId();
    }

    public function insertEgressoFormaIngresso($idEgresso, $tipoIngresso){
        $this->getConection();
        $sql = "INSERT INTO egresso_ingresso(idEgresso, idIngresso) VALUES(?, ?)";
        $this->setParams($idEgresso);
        $this->setParams($tipoIngresso);
        $this->execute($sql);
        return $this->getStmtId();
    }

    public function getFormaIngressoById($idEgresso){
        $this->getConection();
        $sql = "SELECT forma FROM ingresso INNER JOIN egresso_ingresso ON egresso_ingresso.idIngresso = ingresso.idIngresso WHERE idEgresso = ?";
        $this->setParams($idEgresso);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $rows = $this->get($result);
        foreach($rows as $row){
            $forma = $row['forma'];
        }
        $this->close();
        return $forma;
    }
}

?>