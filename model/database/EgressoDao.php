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
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertGraduacao($idCurso, $codCurso, $idInstituto, $idCampus){
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

    public function insertGraduacaoEgresso($idEgresso, $idGraduacao){
        $sql = "INSERT INTO egresso_graduacao(idEgresso, idGraduacao) VALUES(?, ?)";
        $this->setParams($idEgresso);
        $this->setParams($idGraduacao);

        $result = $this->execute($sql);
        if($result){
            return $this->getStmtId();
        }
    }

    public function getDadosEgresso($idPessoa){
        $sql = "SELECT idEgresso, anoIngresso, anoFormatura, nome, cpf, dataNascimento FROM egresso INNER JOIN pessoa ON egresso.idPessoa = pessoa.idPessoa WHERE egresso.idPessoa = ?";
        $this->setParams($idPessoa);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $etniaDao = new EtniaDao();
        $etnia = $etniaDao->getEtniaPessoa($idPessoa);
        $rows = $this->get($result);
        foreach($rows as $row) {
            $data = DateTime::createFromFormat('Y-m-d', $row['dataNascimento']);
            $egresso = new Egresso($row['nome'], $row['cpf'], $data, $etnia, $row['anoIngresso'], $row['anoFormatura']);
            $egresso->setIdEgresso($row['idEgresso']);
            $egresso->setIdPessoa($idPessoa);
            return $egresso;
        }
    }

    public function getGraduacaoByCodigo($idEgresso){
        $sql = "SELECT idGraduacao FROM egresso_graduacao WHERE idEgresso = ?";
        $this->setParams($idEgresso);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $idGraduacao = $this->getId($result);
        return $idGraduacao;
    }
}

?>