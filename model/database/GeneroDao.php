<?php

class GeneroDao extends Dao{

    public function getAllGeneros(){
        $sql = "SELECT tipoGenero FROM genero";
        return $this->query($sql);
    }
}

?>