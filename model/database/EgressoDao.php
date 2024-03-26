<?php
include_once 'Dao.php';
class EgressoDao extends Dao{

    public function insertDadosEgressos($idPessoa, $anoIngresso, $anoFormatura){
        $sql = "INSERT INTO egresso(idPessoa, anoIngresso, anoFormatura) VALUES(?, ?, ?)";
        $this->setParams($idPessoa);
        $this->setParams($anoIngresso);
        $this->setParams($anoFormatura);

        $result = $this->execute($sql);
        if($result){
            return $this->getStmtId();   
        }

    }
}

?>