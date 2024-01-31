<?php

class Campus{
    private int $idCampus;
    private string $tipo;

    public function getiIdCampus(): int{
        return $this->idCampus;
    }

    public function getCampus(): string{
        return $this->tipo;
    }
}

?>