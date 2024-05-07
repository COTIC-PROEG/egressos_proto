<?php 
# include_once 'dadosEgresso.php';
include_once '../../controller/EgressoController.php';

$pessoaController = new EgressoController();
$pessoaController->cadastrarEgresso();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <title>Verificar Credenciais</title>
    </head>
    <body>

        <!-------------------------------- Início da area de cabeçalho ------------------------------------>
        <header>
        <div id="navbar">
            <!---<div class="resp">--->
            <a href="https://egressos.ufpa.br/" class="logo">
                <img src="../images/logo_ufpa.png">
            </a>
            <h1>
                <strong>Pesquisa de Egressos UFPA</strong>
            </h1>
            <button class="return"><strong><a href="validaCpf.php"><p style="font-size: larger;" class="link">🢀</p></a></strong></button>
        </div>
    </header>
        <!-------------------------------- Fim da area de cabeçalho ------------------------------------------>   
         
        <!------------------------ Início da area para a confirmação do CPF ---------------------------------->
        <form method="POST" name="form" action="validaCpf.php">
                <div id="borda">
                    <h2><strong>VERIFICAR CREDENCIAIS</strong></h2>
                    <div class="elements">
                        <p>CPF: 
                        <input class="cpf" placeholder=" Informe seu CPF (sem pontos ou traços)" type= "text" id="cpf" name="cpf" type="text" size="18" alt="  Informe seu CPF" title="CPF"><br></p>                        
                        <p>Data de Nascimento:
                        <input class="dataNascimento cpf" placeholder="Informe sua data de nascimento..." type="date" id="dataNascimento" name="dataNascimento" size="18" alt="Informe sua data de nascimento" title="Data de Nascimento"><br></p>
                        <span class="erro"></span><br>
						<strong><input class="submeter" type="submit" name="botaoConfirmar" id="botaoConfirmar" value="Responder" onclick="validarCpf(event)"></strong><br>    
                    </div>
                </div>
        </form>
        <!-------------------------- Fim da area para a confirmação do CPF ------------------------------------>
		
 
        <!--------------------------------- Início da área do rodapé --------------------------------------->
        <footer>
            <hr>
            <a>Copyright @ 2024 Portal do Egresso da Universidade Federal do Pará</a>
        </footer>
        <!--------------------------------- Fim da área do rodapé --------------------------------------->
        <script src="javascript/validaCpf.js"></script>
    </body>
</html>