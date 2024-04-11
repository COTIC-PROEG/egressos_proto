<?php

include_once '../../model/database/GeneroDao.php';
class GeneroController{

    public function getAllGeneros(){
        $generoDao = new GeneroDao();
        $rows = $generoDao->getAllGeneros();
        $generos = array();
        for($i = 0; $i < count($rows); $i = $i+2){
            $generos[$rows[$i]] = $rows[$i+1];
        }
        return $generos;
    }


}

?>