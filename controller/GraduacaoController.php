<?php

include_once '../../model/database/GraduacaoDao.php';
class GraduacaoController{

    public function getDadosGraduacao($idGraduacao){
        $graduacaoDao = new GraduacaoDao();
        $graduacao = $graduacaoDao->getDadosGraduacao($idGraduacao);
        $graduacao->getCurso()->setNome($this->getCurso($graduacao->getCurso()->getIdCurso()));
        $graduacao->getCampus()->setNome($this->getCampus($graduacao->getCampus()->getIdCampus()));
        $graduacao->getInstituto()->setNome($this->getInstituto($graduacao->getInstituto()->getIdInstituto()));
        return $graduacao;
    }

    private function getCurso($idCurso){
        $cursoController = new CursoController();
        return $cursoController->getCurso($idCurso);
    }

    private function getCampus($idCampus){
        $campusController = new CampusController();
        return $campusController->getCampus($idCampus);
    }

    private function getInstituto($idInstitutor){      
        $institutoController = new InstitutoController();
        return $institutoController->getInstituto($idInstitutor);
    }

}

?>