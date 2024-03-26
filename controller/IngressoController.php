<?php

include_once '../../model/database/IngressoDao.php';
class IngressoController{

    public function cadastraFormaIngresso($idEgresso, $tipoIngresso){
        $ingressoDao = new IngressoDao();
        $array = $ingressoDao->getFormaIngresso($tipoIngresso);
        if($array){
            $idFormaEgresso = $array[0];
            $ingressoDao->insertEgressoFormaIngresso($idEgresso, $idFormaEgresso);
        }else{
            $idNovaFormaIngresso = $ingressoDao->insertFormaIngresso($tipoIngresso);
            $ingressoDao->insertEgressoFormaIngresso($idEgresso, $idNovaFormaIngresso);
        }
    }
}

?>