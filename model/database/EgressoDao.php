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

    public function insertGraduacaoEgresso($idEgresso, $idCurso, $codCurso, $idInstituto, $idCampus){
        $sql = "INSERT INTO graduacao(idEgresso, codigo_sigaa, idCampus, idCurso, idInstituto) VALUES(?, ?, ?, ?, ?)";
        $this->setParams($idEgresso); //idEgresso = id da pessoa que é egresso (idPessoa
        $this->setParams($codCurso);
        $this->setParams($idCampus);
        $this->setParams($idCurso);
        $this->setParams($idInstituto);

        $result = $this->execute($sql);
        if($result){
            return $this->getStmtId();
        }
    }
}

?>