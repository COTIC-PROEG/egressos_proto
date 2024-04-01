<?php

class CursoDao extends Dao{

    public function getCursoByName($curso){
        $sql = "SELECT idCurso FROM curso WHERE nome = ?";
        $this->setParams($curso);
        $this->execute($sql);
        $result = $this->stmt->get_result();
        return $this->getId($result);
    }

    public function insertCurso($curso){
        $sql = "INSERT INTO curso(nome) VALUES(?)";
        $this->setParams($curso);
        $this->execute($sql);
        return $this->getStmtId(); 
    }
}

?>