﻿<?php
include_once 'dadosEgresso.php';
definirDadosSessao();
cpfSecurity();
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

    <!-------------------------------- Iní­cio da area de cabeçalho ------------------------------------>
    <header>
        <div id="navbar">
            <!---<div class="resp">--->
            <a href="https://egressos.ufpa.br/" class="logo">
                <img src="images/logo_ufpa.png">
            </a>
            <h1>
                <strong>Consulta de Egressos UFPA</strong>
            </h1>
            <button class="return"><strong><a href="validaCpf.php">
                        <p style="font-size: larger;" class="link">🢀</p>
                    </a></strong></button>
        </div>
    </header>
    <!-------------------------------- Fim da area de cabeçalho ------------------------------------------>

    <!------------------------ Início da área de consulta de resposta ---------------------------------->
    <section>
        <main class="area-principal-pai">
            <div id="area-principal">
                <div class="dados">

                    <fieldset>

                        <legend><strong>DADOS PESSOAIS</strong></legend><br>

                        <p><strong>CPF: </strong>
                            <span><?php echo $dados['cpf']; ?></span>
                        </p><br>
                        <p><strong>Nome: </strong>
                            <span><?php echo $dados['nome']; ?></span>
                        </p><br>
                        <p><strong>Email: </strong>
                            <span><?php echo $dados['email']; ?></span>
                        </p><br>
                        <p><strong>Data de Nascimento: </strong>
                            <span><?php echo $dados['dataNascimento']; ?></span>
                        </p><br>
                        <p><strong>Idade: </strong>
                            <span> <?php echo $dados['idade']; ?></span>
                        </p><br>
                        <p><strong>Genero: </strong>
                            <span><?php echo $dados['genero']; ?></span>
                        </p><br>
                        <p><strong>Cor: </strong>
                            <span><?php echo $dados['cor']; ?></span>
                        </p><br>

                    </fieldset>

                    <fieldset>

                        <legend><strong>FORMAÇÃO</strong></legend><br>

                        <p><strong>Curso: </strong>
                            <span><?php echo $dados['curso']; ?></span>
                        </p><br>
                        <p><strong>Ano de Ingresso: </strong>
                            <span><?php echo $dados['anoIngresso']; ?></span>
                        </p><br>
                        <p><strong>Ano de Conclusão: </strong>
                            <span><?php echo $dados['anoFormatura']; ?></span>
                        </p><br>
                        <p><strong>Forma de Ingresso: </strong>
                            <span><?php echo $dados['formaIngresso']; ?></span>
                        </p><br>
                        <p><strong>Livre Concorrência ou Cota: </strong>
                            <span><?php echo $dados['cota']; ?></span>
                        </p><br>
                        <p><strong>Campus: </strong>
                            <span><?php echo $dados['campus']; ?></span>
                        </p><br>
                        <p><strong>Obteve bolsa durante o curso: </strong>
                            <span><?php echo $dados['bolsa']; ?></span>
                        </p><br>
                        <?php if (!empty($dados['tipoBolsa'])) : ?>
                            <p><strong>Resumo da bolsa:</strong></p>
                            <span><?php echo $dados['tipoBolsa']; ?></span>
                            </p><br>
                        <?php endif; ?>

                    </fieldset>

                    <fieldset>

                        <legend><strong>DADOS COMPLEMENTARES</strong></legend><br>

                        <?php if (!empty($dados['atividadesExtracurriculares'])) : ?>
                            <p><strong>Atividades acadêmicas extracurriculares durante o curso:</strong>
                                <span><?php echo $dados['atividadesExtracurriculares']; ?></span>
                            </p><br>
                        <?php endif; ?>

                        <p><strong>Atividade remunerada fora da Universidade:</strong>
                            <span><?php echo $dados['atividadeRemunerada']; ?></span>
                        </p><br>

                        <p><strong>Participou de Mobilidade Academica:</strong>
                            <span><?php echo $dados['mobilidadeAcademica']; ?></span>
                        </p><br>

                        <p><strong>Curso de Pós-Graduação: </strong>
                            <span><?php echo $dados['cursoPosGraduacao']; ?></span>
                        </p><br>

                        <?php if (!empty($dados['situacaoCursoPosGraduacao'] &&
                            $dados['situacaoCursoPosGraduacao'])) : ?>
                            <p><strong>Situação do curso: </strong>
                                <span><?php echo $dados['situacaoCursoPosGraduacao']; ?></span>
                            </p><br>
                            <p><strong>Pós-Gradução na UFPA:</strong>
                                <span><?php echo $dados['posGraduacaoUfpa']; ?></span>
                            </p><br>
                        <?php endif; ?>

                    </fieldset>

                    <fieldset>

                        <legend><strong>SITUAÇÃO PROFISSIONAL</strong></legend><br>

                        <p><strong>Exerce atividade profissional atualmente:</strong>
                            <span><?php echo $dados['inseridoNoMercado']; ?></span>
                        </p><br>

                        <p><strong>Em que tipo de organização você exerce sua atividade profissional, principalmente:</strong>
                            <span><?php echo $dados['tipoDeEmprego']; ?></span>
                        </p><br>

                        <p><strong>Qual o principal motivo pelo qual você não exerce/exerceu atividade profissional na sua área de formação:</strong>
                            <span><?php echo $dados['motivo']; ?></span>
                        </p><br>

                        <p><strong>Depois de quanto tempo após a formatura ingressou no mundo do trabalho:</strong>
                            <span><?php echo $dados['tempoFormaturaEmprego']; ?></span>
                        </p><br>

                        <p><strong>Qual sua faixa salarial:</strong>
                            <span><?php echo $dados['faixaSalarial']; ?></span>
                        </p><br>

                        <p><strong>Recebeu orientação durante o curso de graduação para atuar no mundo do trabalho:</strong>
                            <span><?php echo $dados['recebeuOrientacao']; ?></span>
                        </p><br>

                        <p><strong>Você estava preparado para ingressar no mundo do trabalho quando se formou:</strong>
                            <span><?php echo $dados['preparado']; ?></span>
                        </p><br>

                        <p><strong>As temáticas e/ou assuntos abordados nos componentes curriculares cursados durante a graduação contribuíram para o exercício profissional:</strong>
                            <span><?php echo $dados['utilidade']; ?></span>
                        </p><br>

                        <p><strong>O estágio curricular facilitou/colaborou com a inserção no mundo do trabalho:</strong>
                            <span><?php echo $dados['estagioContribuiuEmprego']; ?></span>
                        </p><br>

                        <p><strong>Recebeu orientação, no âmbito do seu respectivo curso, para atuar no mercado de trabalho:</strong>
                            <span><?php echo $dados['recebeuOrientacao']; ?></span>
                        </p><br>

                        <p><strong>Resumo da situação profissional:</strong>
                            <span><?php echo $dados['resumoSituacaoProfissional']; ?></span>
                        </p><br>

                    </fieldset>


                    <fieldset>

                        <legend><strong>RELAÇÃO COM A UNIVERSIDADE</strong></legend><br>

                        <p><strong>Tem mantido algum contato com a UFPA após a formatura da graduação:</strong>
                            <span><?php echo $dados['relacaoUfpa']; ?></span>
                        </p><br>

                    </fieldset>

                    <fieldset>
                        <legend><strong>SATISFAÇÃO COM A INSTITUIÇÃO E COM O CURSO</strong></legend>

                        <P><strong>Nível de satisfação com a UFPA:</strong>
                            <span><?php echo $dados['satisfacaoComUFPA'] ?></span>
                        </P><br>

                        <P><strong>Grau de satisfação geral com a UFPA:</strong>
                            <span><?php echo $dados['grauSatisfacaoComUFPA'] ?></span>
                        </P><br>

                        <P><strong>Nível de satisfação com o curso de graduação concluído:</strong>
                            <span><?php echo $dados['satisfacaoCurso'] ?></span>
                        </P><br>

                        <P><strong>Em que aspecto o curso tem que melhorar:</strong>
                            <span><?php echo $dados['melhorarApectos'] ?></span>
                        </P><br>

                        <?php if (!empty($dados['outrosApectos'])) : ?>
                            <p><strong>Descrição após ter marcado a opção "outros" na pergunta anterior:</strong> </p>
                            <span><?php echo $dados['outrosApectos']; ?></span>
                            </p><br>
                        <?php endif; ?>

                        <P><strong>Você recomendaria seu curso para outra pessoa:</strong>
                            <span><?php echo $dados['recomendacao'] ?></span>
                        </P><br>

                        <?php if (!empty($dados['comentaRecomendacao'])) : ?>
                            <p><strong>Comentario sobre a pergunta anterior:</strong> </p>
                            <span><?php echo $dados['comentaRecomendacao']; ?></span>
                            </p><br>
                        <?php endif; ?>
                    </fieldset>
                </div>
            </div>
        </main>
    </section>
    <!-------------------------- Fim da área de consulta de resposta ------------------------------------>

    <!--------------------------------- Início da área do rodapé --------------------------------------->
    <footer>
        <hr>
        <a>Copyright @ 2023 Portal do Egresso da Universidade Federal do Pará</a>
    </footer>
    <!--------------------------------- Fim da área do rodapé --------------------------------------->

</body>

</html>