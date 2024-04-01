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

    public function searchGraduacaoByCodigo($codigo){
        $sql = "SELECT * FROM graduacao WHERE codigo_sigaa = ?";
        $this->setParams($codigo);
        $result = $this->execute($sql);
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

    public function insertGraduacaoEgresso($idCurso, $codCurso, $idInstituto, $idCampus){
        $sql = "INSERT INTO graduacao(codigo_sigaa, idCampus, idCurso, idInstituto) VALUES(?, ?, ?, ?)";
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