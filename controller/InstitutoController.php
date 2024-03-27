<?php

include_once '../../model/database/InstitutoDao.php';
class InstitutoController{

    public function cadastraCurso($instituto){
        $institutoDao = new InstitutoDao();
        $array = $institutoDao->getInstitutoByName($instituto);
        $idInstituto = $array[0];
        if($idInstituto == null){
            $idInstituto = $institutoDao->insertInstituto($instituto);
        }
        return $idInstituto;
    }


}

?>