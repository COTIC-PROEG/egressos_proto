<?php

include_once '../../model/database/InstitutoDao.php';
class InstitutoController{

    public function cadastraInstituto($instituto){
        $institutoDao = new InstitutoDao();
        $idInstituto = $institutoDao->getInstitutoByName($instituto);
        if($idInstituto == null){
            $idInstituto = $institutoDao->insertInstituto($instituto);
        }
        return $idInstituto;
    }

    public function getInstituto($idInstituto){
        $institutoDao = new InstitutoDao();
    }


}

?>