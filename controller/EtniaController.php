<?php

include_once '../../model/database/EtniaDao.php';
class EtniaController{
    public function cadastraEtniaPessoa($idPessoa, $etnia){
        $etniaDao = new EtniaDao();
        $idEtnia = $etniaDao->getEtniaByName($etnia);
        if($idEtnia != null){
            $etniaDao->insertEtniaPessoa($idPessoa, $idEtnia);
        }else{
            $idNovaEtnia = $etniaDao->insertEtnia($etnia);
            $etniaDao->insertEtniaPessoa($idPessoa, $idNovaEtnia);
        }
    }

    public function getEtniaPessoa($idPessoa){
        $etniaDao = new EtniaDao();
        $etnia = $etniaDao->getEtniaPessoa($idPessoa);
        return $etnia;
    }
}

?>