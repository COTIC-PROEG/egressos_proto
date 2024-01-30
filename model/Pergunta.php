<?php

class Pergunta{
    private int $idPergunta;
    private string $texto;
    private bool $status;

    public function getIdPergunta(): int{
        return $this->idPergunta;
    }

    public function getTexto(): string {
        return $this->texto;
    }

    public function getStatus(): bool{
        return $this->status;
    }
}

?>