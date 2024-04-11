<?php

class GeneroDao extends Dao{

    public function getAllGeneros(){
        $sql = "SELECT * FROM genero";
        return $this->query($sql);
    }
}

?>