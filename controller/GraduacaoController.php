<?php

include_once '../../model/database/GraduacaoDao.php';
class GraduacaoController{

    public function getDadosGraduacao($idGraduacao){
        $graduacaoDao = new GraduacaoDao();
        $graduacao = $graduacaoDao->getDadosGraduacao($idGraduacao);
        echo var_dump($graduacao->getCodigoSigaa());
    }

}

?>