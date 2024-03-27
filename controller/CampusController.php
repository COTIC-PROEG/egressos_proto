<?php

include_once '../../model/database/CampusDao.php';
class CampusController{

    public function cadastraCampus($campus){
        $campusDao = new CampusDao();
        $array = $campusDao->getCampusByName($campus);
        $idCampus = $array[0];
        if($idCampus == null){
            $idCampus = $campusDao->insertCampus($campus);
        }
        return $idCampus;
    }

}

?>