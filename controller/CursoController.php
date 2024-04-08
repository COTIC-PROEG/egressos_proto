<?php

include_once '../../model/database/CursoDao.php';
class CursoController{

    public function cadastraCurso($curso){
        $cursoDao = new CursoDao();
        $idCurso = $cursoDao->getCursoByName($curso);
        if($idCurso == null){
            $idCurso = $cursoDao->insertCurso($curso);
        }
        return $idCurso;
    }

    public function getCurso($idCurso){
        $cursoDao = new CursoDao();
    }


}

?>