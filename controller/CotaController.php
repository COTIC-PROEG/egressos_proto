<?php

class CotaController{

    public function cadastraCotaIngresso($idEgresso, $tipoCota){
        $cotaDao = new cotaDao();
        $idFormaEgresso = $cotaDao->getCotaByName($tipoCota);
        if($idFormaEgresso != null){
            $cotaDao->insertEgressoCota($idEgresso, $idFormaEgresso);
        }else{
            $idNovaFormaIngresso = $cotaDao->insertCota($tipoCota);
            $cotaDao->insertEgressoCota($idEgresso, $idNovaFormaIngresso);
        }
    }

    public function getCotaIngresso($idEgresso){
        // $ingressoDao = new IngressoDao();
        // $ingresso = new Ingresso();
        // $ingresso->setTipoIngresso($ingressoDao->getFormaIngressoById($idEgresso));
        // return $ingresso;
    }
}

?>