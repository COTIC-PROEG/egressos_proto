<?php

include_once '../../model/database/EtniaDao.php';
class EtniaController{

    public function getAllEtnias() {
        $etniaDao = new EtniaDao();
    }

    public function cadastraEtniaPessoa($idPessoa, $etnia){
        $etniaDao = new EtniaDao();
        $array = $etniaDao->getEtniaDaoByName($etnia);
        if($array){
            $idEtnia = $array[0];
            $etniaDao->insertEtniaPessoa($idPessoa, $idEtnia);
        }else{
            $idNovaEtnia = $etniaDao->insertEtnia($etnia);
            $etniaDao->insertEtniaPessoa($idPessoa, $idNovaEtnia);
        }
    }
}

?>