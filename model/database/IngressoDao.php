<?php
include_once 'Dao.php';
class IngressoDao extends Dao{
    public function getFormaIngresso($tipoIngresso){
        $sql = "SELECT idIngresso FROM ingresso WHERE forma = ?";
        $this->setParams($tipoIngresso);
        $this->execute($sql);
        $rows = array();
        $result = $this->stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                $rows[] = $r;
            }
        }
        $this->close();
        return $rows;
    }

    public function insertFormaIngresso($tipoIngresso){
        $sql = "INSERT INTO ingresso(forma) VALUES(?)";
        $this->setParams($tipoIngresso);
        $this->execute($sql);
        return $this->getStmtId();
    }

    public function insertEgressoFormaIngresso($idEgresso, $tipoIngresso){
        $sql = "INSERT INTO egresso_ingresso(idEgresso, idIngresso) VALUES(?, ?)";
        $this->setParams($idEgresso);
        $this->setParams($tipoIngresso);
        $this->execute($sql);
        return $this->getStmtId();
    }
}

?>