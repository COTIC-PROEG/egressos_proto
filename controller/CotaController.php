<?php

include_once '../../model/database/CotaDao.php';
class CotaController{

    public function cadastraCota($idEgresso, $tipoCota){
        $cotaDao = new cotaDao();
        $idFormaEgresso = $cotaDao->getCotaByName($tipoCota);
        if($idFormaEgresso != null){
            $cotaDao->insertEgressoCota($idEgresso, $idFormaEgresso);
        }else{
            $idNovaFormaIngresso = $cotaDao->insertCota($tipoCota);
            $cotaDao->insertEgressoCota($idEgresso, $idNovaFormaIngresso);
        }
    }

    public function getCota($idEgresso){
        $cotaDao = new CotaDao();
        $cota = new Cota();
        $cota->setTipoCota($cotaDao->getCotaById($idEgresso));
        return $cota;
    }
}

?>