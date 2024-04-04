<?php

include_once '../../model/class/Etnia.php';
class EtniaDao extends Dao{

    public function getEtniaByName($etnia){
        $sql = "SELECT idEtnia FROM etnia WHERE tipoEtnia = ?";
        $this->setParams($etnia->getTipoEtnia());
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertEtnia($etnia){
        $sql = "INSERT INTO etnia(tipoEtnia) VALUES(?)";
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

    public function getEtniaPessoa($idPessoa){
        $sql = "SELECT tipoEtnia FROM etnia INNER JOIN pessoa_etnia ON etnia.idEtnia = pessoa_etnia.idEtnia WHERE pessoa_etnia.idPessoa = ?";
        $this->setParams($idPessoa);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $rows = $this->get($result);
        foreach($rows as $row) {
            return new Etnia($row['tipoEtnia']);
        }
    }

}

?>