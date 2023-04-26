﻿<?php
include_once 'dadosEgresso.php';
session_start();
$dados = getDadosEgressoFromDatabase($_SESSION['cpf']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Verificar Credenciais</title>
</head>

<body>

    <!-------------------------------- InÃƒÂ­cio da area de cabeÃçalho ------------------------------------>
    <header>
        <div id="navbar">
            <div class="resp">
                <h1>
                    <strong>Consulta de Egressos da UFPA</strong>
                </h1>
            </div>
        </div>

        <div id="barra">
            <a href="https://egressos.ufpa.br/">
                <img class="logo" src="images/logo_ufpa.png">
            </a>
            <button class="return" type="button"><strong><a style="font-size: larger;" class="link" href="validaCpf.php">🢀</a></strong></button>
            </a>
        </div>
    </header>
    <!-------------------------------- Fim da area de cabeÃçalho ------------------------------------------>

    <!------------------------ InÃ­Â­cio da área de consulta de resposta ---------------------------------->
    <section>
        <div id="area-principal">
            <fieldset>
                <legend><strong>SEUS DADOS CADASTRAIS</strong></legend><br>
            
                <div class="dados">
                    <p>CPF: 
                        <span><?php echo $dados['cpf']; ?></span></p><br>
                    <p>Nome: 
                        <span><?php echo $dados['nome']; ?></span></p><br>
                    <p>Email: 
                    <span><?php echo $dados['email']; ?></span></p><br>
                    <p>Data de Nascimento: 
                    <span><?php echo $dados['dataNascimento']; ?></span></p><br>
                    <p>Idade: 
                    <span> <?php echo $dados['idade']; ?></span></p><br>
                    <p>Genero: 
                    <span><?php echo $dados['genero']; ?></span></p><br>
                    <p>Cor: 
                    <span><?php echo $dados['cor']; ?></span></p><br>
                    <p>Curso: 
                    <span><?php echo $dados['curso']; ?></span></p><br>
                    <p>Ano de Ingresso: 
                    <span><?php echo $dados['anoIngresso']; ?></span></p><br>
                    <p>Campus: 
                    <span><?php echo $dados['campus']; ?></span></p><br>
                    <p>Obteve bolsa durante o curso?: 
                    <span><?php echo $dados['bolsa']; ?></span></p><br>
                    <p>Resumo da bolsa:
                    <span><?php echo $dados['resumoBolsa']; ?></span></p><br>
                    <p>Participou de atividades acadêmicas extracurriculares durante o curso?
                    <span><?php echo $dados['atividadesExtracurriculares']; ?></span></p><br>
                    <p>Durante o curso, você desenvolveu atividade remunerada fora da Universidade?
                    <span><?php echo $dados['atividadeRemunerada']; ?></span></p><br>
                    <p>Curso de Pós-Graduação: 
                    <span><?php echo $dados['cursoPosGraduacao']; ?></span></p><br>
                    <p>Situação do curso: 
                    <span><?php echo $dados['situacaoCursoPosGraduacao']; ?></span></p><br>
                    <p>O curso de Pós-Gradução é na UFPA? 
                    <span><?php echo $dados['posGraduacaoUfpa']; ?></span></p><br>
                    <p>Atualmente está inserido no mercado de trabalho? 
                    <span><?php echo $dados['inseridoNoMercado']; ?></span></p><br>
                    <p>Modalidade de emprego: 
                    <span><?php echo $dados['tipoDeEmprego']; ?></span></p><br>
                    <p>Tempo necessário para conseguir atividade remunerada: 
                    <span><?php echo $dados['tempoFormaturaEmprego']; ?></span></p><br>
                    <p>Trabalha na área de formação? 
                    <span><?php echo $dados['trabalhaNaAreaDeFormacao']; ?></span></p><br>
                    <p>Faixa salarial: 
                    <span><?php echo $dados['faixaSalarial']; ?></span></p><br>
                    <p>Há relação entre seu trabalho e sua formação? 
                    <span><?php echo $dados['relacaoCursoTrabalho']; ?></span></p><br>
                    <p>Recebeu orientação para atuar no mercado de trabalho? 
                    <span><?php echo $dados['recebeuOrientacao']; ?></span></p><br>
                    <p>As disciplinas ministradas tiveram alguma utilidade no âmbito profissional? 
                    <span><?php echo $dados['disciplinasForamUteis']; ?></span></p><br>
                    <p>O(s) estágio(s) que cumpriu no curso, tiveram alguma utilidade para a inserção no mercado de trabalho? 
                    <span><?php echo $dados['estagioContribuiuEmprego']; ?></span></p><br>
                    <p>Descrição da situação profissional: 
                    <span><?php echo $dados['resumoSituacaoProfissional']; ?></span></p><br>
                    <p>Satisfação com o curso: 
                    <span><?php echo $dados['satisfacaoComCurso']; ?></span></p><br>
                    <p>Resumo da satisfação: 
                    <span><?php echo $dados['resumoSatisfacaoComCurso']; ?></span></p><br>
                    <p>Recomendaria o curso para outra pessoa?: 
                    <span><?php echo $dados['recomendaCurso']; ?></span></p><br>
                    <p>Justificativa: 
                        <span><?php echo $dados['resumoRecomendacaoCurso']; ?></span></p><br>
                    <p>Paticipa de eventos na UFPA? 
                    <span><?php echo $dados['participaDeEventos']; ?></span></p><br>
                    <p>Resumo do(s) evento(s) que participa: 
                    <span><?php echo $dados['resumoEventosAtuais']; ?></span></p><br>
                    <p>Participa de projetos na UFPA? 
                    <span><?php echo $dados['participaDeProjeto']; ?></span></p><br>
                    <p>Resumo do(s) projeto(s) que participa: 
                    <span><?php echo $dados['resumoProjetosAtuais']; ?></span></p><br>
                    <p>Participa de algum curso da UFPA?: 
                    <span><?php echo $dados['participaDeCurso']; ?></span></p><br>
                    <p>Resumo do(s) curso(s): 
                    <span><?php echo $dados['resumoCursosAtuais']; ?></span></p><br>
                    <p>Atividades que você gostaria de participar: 
                    <span><?php echo $dados['resumoAtividadesInteresse']; ?></span></p><br>
                    <p>Sugestão para o questionário: 
                    <span><?php echo $dados['resumoSugestaoQuestionario']; ?></span></p><br>
                </div>
            </fieldset>
        </div>
    </section>
    <!-------------------------- Fim da área de consulta de resposta ------------------------------------>

    <!--------------------------------- InÃ­Â­cio da área do rodapÃ© --------------------------------------->
    <footer>
        <hr>
        <a>Copyright @ 2023 Portal do Egresso da Universidade Federal do ParÃƒÂ¡</a>
    </footer>
    <!--------------------------------- Fim da área do rodapÃ© --------------------------------------->

</body>

</html>