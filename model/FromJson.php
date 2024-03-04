<?php
include 'class/Pessoa.php';
include 'class/Etnia.php';

require_once '../../vendor/autoload.php';

use GuzzleHttp\Client;

class FromJson{
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

    private static $ultimaMatricula = null;

    public static function getUltimaMatricula($cpf){
        $url = 'https://sagitta.ufpa.br/sagitta/ws/consultaegresso/'.$cpf.'?login=diegolisboa';
        
        $client = new Client();
        $response = $client->request('GET',$url);
        $status = $response->getStatusCode();
        
        if($status == 200){
            $json = $response->getBody();
            $json = json_decode($json);
            if ($json){
                $ultimoAnoIngresso = 0;
                foreach ($json as $ultima_matricula){
                    if ($ultima_matricula->anoFormatura > $ultimoAnoIngresso){
                        self::$ultimaMatricula = $ultima_matricula;
                        $ultimoAnoIngresso = self::$ultimaMatricula->anoFormatura; 
                    }
                    
                }
            }else{
                echo "<script>alert('Egresso não encontrado');</script>";
            }
        }

        return $status;
    }

    public static function getPessoaFromJson(){ 
        $pessoa = new Pessoa(self::$ultimaMatricula->nome, 
                            self::$ultimaMatricula->cpf, 
                            self::formataData(self::$ultimaMatricula->dataNascimento), 
                            new Etnia(self::$ultimaMatricula->raca)
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