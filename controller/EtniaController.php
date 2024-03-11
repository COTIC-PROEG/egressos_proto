<?php

include_once '../../model/database/EtniaDao.php';
class EtniaController{

    public function getAllEtnias() {
        $etniaDao = new EtniaDao();
    }

    public function cadastraEtniaPessoa($etnia){
        $etniaDao = new EtniaDao();
        $result = $etniaDao->getEtniaDao($etnia);
        if($result->num_rows > 0){
            $obj = $result->fetch_object();
            echo var_dump($obj->tipo);
        }else{
            echo "<script>alert('cadastrando etnia');</script>";
            $etniaDao->insertEtnia($etnia);
        }
    }
}

?>