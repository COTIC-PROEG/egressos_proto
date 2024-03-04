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
        //$json = json_decode(file_get_contents($url));

        $client = new Client();
        $response = $client->request('GET',$url);
        $status = $response->getStatusCode();

            if($status == 200){
                echo '<html>teste</html>';
                $json = $response->getBody();
                if ($json){
                    $ultimoAnoIngresso = 0;
                    foreach ($json as $ultima_matricula)
                    {
                        if ($ultima_matricula->anoFormatura > $ultimoAnoIngresso)
                        {
                            self::$ultimaMatricula = $ultima_matricula;
                            $ultimoAnoIngresso = self::$ultimaMatricula->anoFormatura; 
                        }
                        
                    }
                }else{
                    #disparar exceção
                }
            }else if ($response->getStatusCode() == 404){
                echo "<script>alert('Egresso não encontrado na base de dados');</script>";
            }
    }

    public static function getPessoaFromJson(){ 
        $pessoa = new Pessoa(self::$ultimaMatricula->nome, 
                            self::$ultimaMatricula->cpf, 
                            self::$ultimaMatricula->email, 
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