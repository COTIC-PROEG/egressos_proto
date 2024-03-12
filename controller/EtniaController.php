<?php

include_once '../../model/database/EtniaDao.php';
class EtniaController{

    public function getAllEtnias() {
        $etniaDao = new EtniaDao();
    }

    public function cadastraEtniaPessoa($idPessoa, $etnia){
        $etniaDao = new EtniaDao();
        $idEtnia = $etniaDao->getEtniaDaoByName($etnia);
        echo var_dump($idEtnia);
        if($idEtnia){
            $etniaDao->insertEtniaPessoa($idPessoa, $idEtnia);
        }else{
            echo "<script>alert('cadastrando etnia');</script>";
            $idNovaEtnia = $etniaDao->insertEtnia($etnia);
            $etniaDao->insertEtniaPessoa($idPessoa, $idNovaEtnia);
        }
    }
}

?>