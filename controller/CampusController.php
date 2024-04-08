<?php

include_once '../../model/database/CampusDao.php';
class CampusController{

    public function cadastraCampus($campus){
        $campusDao = new CampusDao();
        $idCampus = $campusDao->getCampusByName($campus);
        if($idCampus == null){
            $idCampus = $campusDao->insertCampus($campus);
        }
        return $idCampus;
    }

    public function getCampus($idCampus){
        $campusDao = new CampusDao();
    }

}

?>