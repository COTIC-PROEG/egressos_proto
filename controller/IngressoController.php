<?php

include_once '../../model/database/IngressoDao.php';
include_once '../../model/class/Ingresso.php';
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

    public function getFormaIngresso($idEgresso){
        $ingressoDao = new IngressoDao();
        $ingresso = new Ingresso();
        $ingresso->setTipoIngresso($ingressoDao->getFormaIngressoById($idEgresso));
        return $ingresso;
    }
}

?>