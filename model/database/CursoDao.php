<?php

class CursoDao extends Dao{

    public function getCursoByName($curso){
        $sql = "SELECT idCurso FROM curso WHERE nome = ?";
        $this->setParams($curso->getCurso());
        $this->execute($sql);
        $rows = array();
        $result = $this->stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                $rows[] = $r;
            }
        }
        $this->close();
        return $rows;
    }

    public function insertCurso($curso){
        $sql = "INSERT INTO curso(nome) VALUES(?)";
        $this->setParams($curso);
        $this->execute($sql);
        return $this->getStmtId(); 
    }
}

?>