<?php

class PerguntaDao extends AbstractDao{
    public function selectPerguntasValidas(){
        $conn = $this->getConexaoMySql();
        $conn->open();
        $sql = "select texto from pergunta where status = 1";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}

?>