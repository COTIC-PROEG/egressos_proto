<?php

include_once '../../model/database/CursoDao.php';
class CursoController{

    public function cadastraCurso($curso){
        $cursoDao = new CursoDao();
        $array = $cursoDao->getCursoByName($curso);
        $idCurso = $array[0];
        if($idCurso == null){
            $idCurso = $cursoDao->insertCurso($curso);
        }
        return $idCurso;
    }


}

?>