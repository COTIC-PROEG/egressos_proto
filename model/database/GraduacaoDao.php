<?php
include_once '../../model/class/Graduacao.php';
include_once '../../model/class/Curso.php';
include_once '../../model/class/Campus.php';
include_once '../../model/class/Instituto.php';
class GraduacaoDao extends Dao{

    public function getDadosGraduacao($idGraduacao){
        $this->getConection();
        $sql = "SELECT * FROM graduacao WHERE idGraduacao = ?";
        $this->setParams($idGraduacao);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        $rows = $this->get($result);
        $graduacao = new Graduacao();
        $curso = new Curso();
        $campus = new Campus();
        $instituto = new Instituto();
        $graduacao->setCampus($campus);
        $graduacao->setCurso($curso);
        $graduacao->setInstituto($instituto);
        foreach($rows as $row){
            $graduacao->setIdGraduacao($row['idGraduacao']);
            $graduacao->setCodigoSigaa($row['codigo_sigaa']);
            $graduacao->getCampus()->setIdCampus($row['idCampus']);
            $graduacao->getCurso()->setIdCurso($row['idCurso']);
            $graduacao->getInstituto()->setIdInstituto($row['idInstituto']);
        }
        $this->close();
        return $graduacao;
    }

    public function getAllPosGraduacao(){
        $this->getConection();
        $sql = "SELECT * FROM posgraduacao";
        return $this->query($sql);
    }
}

?>