<?php

include_once '../../model/database/IngressoDao.php';
class IngressoController{

    public function cadastraFormaIngresso($idEgresso, $tipoIngresso){
        $ingressoDao = new IngressoDao();
        $idFormaEgresso = $ingressoDao->getFormaIngresso($tipoIngresso);
        if($idFormaEgresso != null){
            $ingressoDao->insertEgressoFormaIngresso($idEgresso, $idFormaEgresso);
        }else{
            $idNovaFormaIngresso = $ingressoDao->insertFormaIngresso($tipoIngresso);
            $ingressoDao->insertEgressoFormaIngresso($idEgresso, $idNovaFormaIngresso);
        }
    }
}

?>