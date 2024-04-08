<?php 

class Graduacao{
    private $idGraduacao;
    private $codigoSigaa;
    private Curso $curso;
    private Campus $campus;
    private Instituto $instituto;
    
    public function getIdGraduacao(){
        return $this->idGraduacao;
    }
    
    public function setIdGraduacao($idGraduacao){
        $this->idGraduacao = $idGraduacao;
    }

    public function getCodigoSigaa(){
        return $this->codigoSigaa;
    }

    public function setCodigoSigaa($codigoSigaa){
        $this->codigoSigaa = $codigoSigaa;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setCurso($curso){
        $this->curso = $curso;
    }

    public function getCampus(){
        return $this->campus;
    }

    public function setCampus($campus){
        $this->campus = $campus;
    }

    public function getInstituto(){
        return $this->instituto;
    }

    public function setInstituto($instituto){
        $this->instituto = $instituto;
    }
    
}

?>