<?php

class GeneroDao extends Dao{

    public function getAllGeneros(){
        $this->getConection();
        $sql = "SELECT * FROM genero";
        return $this->query($sql);

    }
}

?>