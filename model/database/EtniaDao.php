<?php

include_once '../../model/class/Etnia.php';
class EtniaDao extends Dao{

    public function getEtniaByName($etnia){
        $sql = "SELECT idEtnia FROM etnia WHERE tipo = ?";
        $this->setParams($etnia->getTipoEtnia());
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

    public function insertEtnia($etnia){
        $sql = "INSERT INTO etnia(tipo) VALUES(?)";
        $this->setParams($etnia->getTipoEtnia());
        $this->execute($sql);
        return $this->getStmtId(); 
    }

    public function insertEtniaPessoa($idPessoa, $idEtnia){
        $sql = "INSERT INTO pessoa_etnia(idPessoa, idEtnia) VALUES(?, ?)";
        $this->setParams($idPessoa);
        $this->setParams($idEtnia);
        $this->execute($sql);
        $this->getStmtId();
    }

    public function get(){}
}

?>