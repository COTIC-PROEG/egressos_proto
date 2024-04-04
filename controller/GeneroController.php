<?php

include_once '../../model/database/GeneroDao.php';
class GeneroController{

    public function getAllGeneros(){
        $generoDao = new GeneroDao();
        return $generoDao->getAllGeneros();
    }


}

?>