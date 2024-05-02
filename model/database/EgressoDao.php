<?php
include_once 'Dao.php';
class EgressoDao extends Dao{

    public function insertDadosEgressos($idPessoa, $anoIngresso, $anoFormatura){
        $this->getConection();
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
        $this->getConection();
        $sql = "SELECT * FROM graduacao WHERE codigo_sigaa = ?";
        $this->setParams($codigo);
        $result = $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertGraduacao($idCurso, $codCurso, $idInstituto, $idCampus){
        $this->getConection();
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
        $this->getConection();
        $sql = "INSERT INTO egresso_graduacao(idEgresso, idGraduacao) VALUES(?, ?)";
        $this->setParams($idEgresso);
        $this->setParams($idGraduacao);

        $result = $this->execute($sql);
        if($result){
            return $this->getStmtId();
        }
    }

    public function getDadosEgresso($idPessoa){
        $this->getConection();
        $sql = "SELECT idEgresso, anoIngresso, anoFormatura, nome, cpf, dataNascimento FROM egresso INNER JOIN pessoa ON egresso.idPessoa = pessoa.idPessoa WHERE egresso.idPessoa = ?";
        $this->setParams($idPessoa);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $etniaDao = new EtniaDao();
        $etnia = $etniaDao->getEtniaPessoa($idPessoa);
        $faixaEtaria = $this->getFaixaEtaria($idPessoa);
        $rows = $this->get($result);
        if($rows == null){
            $egresso = null;
        }else{
            foreach($rows as $row) {
                $data = DateTime::createFromFormat('Y-m-d', $row['dataNascimento']);
                $egresso = new Egresso($row['nome'], $row['cpf'], $data, $etnia, $row['anoIngresso'], $row['anoFormatura']);
                $egresso->setIdEgresso($row['idEgresso']);
                $egresso->setIdPessoa($idPessoa);
            }
        }
        $egresso->setFaixaEtaria($faixaEtaria);
        $this->close();
        return $egresso;
    }

    private function getFaixaEtaria($idPessoa){
        $sql = "SELECT faixa FROM faixa_etaria INNER JOIN pessoa_faixa_etaria ON faixa_etaria.idFaixaEtaria = pessoa_faixa_etaria.idFaixaEtaria WHERE pessoa_faixa_etaria.idPessoa = ?";
        $this->setParams($idPessoa);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $rows = $this->get($result);
        if($rows == null){
            $faixa = null;
        }else{
            foreach($rows as $row) {
                $faixa = $row['faixa'];
            }
        }
        return $faixa;
    }

    public function getGraduacaoByCodigo($idEgresso){
        $this->getConection();
        $sql = "SELECT idGraduacao FROM egresso_graduacao WHERE idEgresso = ?";
        $this->setParams($idEgresso);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $idGraduacao = $this->getId($result);
        $this->close();
        return $idGraduacao;
    }

    public function egressoByCpf($cpf){
        $this->getConection();
        $sql = "SELECT idPessoa FROM pessoa WHERE cpf = ?";
        $this->setParams($cpf);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $idEgresso = $this->getId($result);
        $this->close();
        return $idEgresso;
    }

    public function cadastraAllInformacoes($egresso){
        $egressoController = new EgressoController();
        $ingressoController = new IngressoController();
        $cotaController = new CotaController();
        $this->getConection();
        try{
             $this->beginTransaction();
             $idPessoa = $egressoController->cadastraPessoa($egresso);
             $idEgresso = $this->insertDadosEgressos($idPessoa, $egresso->getAnoIngresso(), $egresso->getAnoFormatura());
             $ingressoController->cadastraFormaIngresso($idEgresso, FromJson::getFormaIngresso());
             $cotaController->cadastraCota($idEgresso, FromJson::getCota());
             $egressoController->cadastraCursoEgresso($idEgresso, FromJson::getCurso(), FromJson::getCodigoCurso(), FromJson::getUnidadeAcademica(), FromJson::getCampus());
             $this->commit();
         }catch(Exception $e){
             $this->rollback();
             // Lançar exceção personalizada depois
         }
        return $idPessoa;
    }
}

?>