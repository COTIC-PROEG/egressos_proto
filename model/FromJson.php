<?php
include 'class/Pessoa.php';
include 'class/Etnia.php';

abstract class FromJson{
    // private string $ultimaMatricula;
    // private string $nome;
    // private string $cpf;
    // private string $raca;
    // private int $anoIngresso;
    // private int $periodoingresso;
    // private string $conta;
    // private string $dataFormatura;
    // private int $anoFormatura;
    // private int $periodoFormatura;
    // private string $curso;
    // private string $unidadeAcademica;
    // private string $campus;

    public static $ultimaMatricula;

    public static function getUltimaMatricula($cpf){
        $url = 'https://sagitta.ufpa.br/sagitta/ws/consultaegresso/'.$cpf.'?login=diegolisboa';
        $json = json_decode(file_get_contents($url));
        if ($json){
            $ultimoAnoIngresso = 0;
            foreach ($json as $ultima_matricula)
            {
                if ($ultima_matricula->anoFormatura > $ultimoAnoIngresso)
                {
                    static::$ultimaMatricula = $ultima_matricula;
                    $ultimoAnoIngresso = static::$ultimaMatricula->anoFormatura; 
                }
                
            }
        }else{
            #disparar exceção
        }
    }

    public static function getPessoaFromJson(){ 
        $pessoa = new Pessoa(static::$ultimaMatricula->nome, 
                            static::$ultimaMatricula->cpf, 
                            static::$ultimaMatricula->email, 
                            static::formataData(static::$ultimaMatricula->dataNascimento), 
                            new Etnia(static::$ultimaMatricula->raca)
                        );
        return $pessoa;
    }

    private function formataData($data){
        $formato = 'd/m/Y';
        $dataFormatada = DateTime::createFromFormat($formato, $data);
        return $dataFormatada;
    }
}

?>