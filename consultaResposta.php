<?php
include_once 'dadosEgresso.php';
definirDadosSessao();

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
			<div class="resp">
				<h1>
					<strong>Pesquisa de Egressos da UFPA</strong>
				</h1>
			</div>
		</div>

		<div id="barra">
			<a href="https://egressos.ufpa.br/">
				<img class="logo" src="images/logo_ufpa.png">
			</a>
			<button class="return" type="button"><a style="font-size: larger;" class="link"
						href="validaCpf.php">🢀</a></button>
			</a>
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

                        <p>CPF: 
                            <span><?php echo $dados['cpf']; ?></span>
                        </p><br>
                        <p>Nome: 
                            <span><?php echo $dados['nome']; ?></span>
                        </p><br>
                        <p>Email: 
                            <span><?php echo $dados['email']; ?></span>
                        </p><br>
                        <p>Data de Nascimento: 
                            <span><?php echo $dados['dataNascimento']; ?></span>
                        </p><br>
                        <p>Idade: 
                            <span> <?php echo $dados['idade']; ?></span>
                        </p><br>
                        <p>Genero: 
                            <span><?php echo $dados['genero']; ?></span>
                        </p><br>
                        <p>Cor: 
                            <span><?php echo $dados['cor']; ?></span>
                        </p><br>

                    </fieldset>

                    <fieldset>

                        <legend><strong>FORMAÇÃO</strong></legend><br>

                        <p>Curso: 
                            <span><?php echo $dados['curso']; ?></span>
                        </p><br>
                        <p>Ano de Ingresso: 
                            <span><?php echo $dados['anoIngresso']; ?></span>
                        </p><br>
                        <p>Ano de Conclusão: 
                            <span><?php echo $dados['anoFormatura']; ?></span>
                        </p><br>
                        <p>Forma de Ingresso: 
                            <span><?php echo $dados['formaIngresso']; ?></span>
                        </p><br>
                        <p>Livre Concorrência ou Cota: 
                            <span><?php echo $dados['cota']; ?></span>
                        </p><br>
                        <p>Campus: 
                            <span><?php echo $dados['campus']; ?></span>
                        </p><br>
                        <p>Obteve bolsa durante o curso: 
                            <span><?php echo $dados['bolsa']; ?></span>
                        </p><br>
                        <?php if (!empty($dados['tipoBolsa'])) : ?>
                            <p>Resumo da bolsa: 
                            <span><?php echo $dados['tipoBolsa']; ?></span>
                            </p><br>
                        <?php endif; ?>

                    </fieldset>

                    <fieldset>

                        <legend><strong>DADOS COMPLEMENTARES</strong></legend><br>

                        <?php if (!empty($dados['atividadesExtracurriculares'])) : ?>
                            <p>Atividades acadêmicas extracurriculares durante o curso:
                                <span><?php echo $dados['atividadesExtracurriculares']; ?></span>
                            </p><br>
                        <?php endif; ?>

                        <p>Atividade remunerada fora da Universidade:
                            <span><?php echo $dados['atividadeRemunerada']; ?></span>
                        </p><br>

                        <p>Participou de Mobilidade Academica:
                            <span><?php echo $dados['mobilidadeAcademica']; ?></span>
                        </p><br>

                        <p>Curso de Pós-Graduação: 
                            <span><?php echo $dados['cursoPosGraduacao']; ?></span>
                        </p><br>

                        <?php if (!empty($dados['situacaoCursoPosGraduacao'] &&
                            $dados['situacaoCursoPosGraduacao'])) : ?>
                            <p>Situação do curso: 
                                <span><?php echo $dados['situacaoCursoPosGraduacao']; ?></span>
                            </p><br>
                            <p>Pós-Gradução na UFPA:
                                <span><?php echo $dados['posGraduacaoUfpa']; ?></span>
                            </p><br>
                        <?php endif; ?>

                    </fieldset>

                    <fieldset>

                        <legend><strong>SITUAÇÃO PROFISSIONAL</strong></legend><br>

                        <p>Exerce atividade profissional atualmente:
                            <span><?php echo $dados['inseridoNoMercado']; ?></span>
                        </p><br>

                        <p>Em que tipo de organização você exerce sua atividade profissional, principalmente:
                            <span><?php echo $dados['tipoDeEmprego']; ?></span>
                        </p><br>

                        <p>Qual o principal motivo pelo qual você não exerce/exerceu atividade profissional na sua área de formação:
                            <span><?php echo $dados['motivo']; ?></span>
                        </p><br>

                        <p>Depois de quanto tempo após a formatura ingressou no mundo do trabalho:
                            <span><?php echo $dados['tempoFormaturaEmprego']; ?></span>
                        </p><br>

                        <p>Qual sua faixa salarial:
                            <span><?php echo $dados['faixaSalarial']; ?></span>
                        </p><br>

                        <p>Recebeu orientação durante o curso de graduação para atuar no mundo do trabalho:
                            <span><?php echo $dados['recebeuOrientacao']; ?></span>
                        </p><br>

                        <p>Você estava preparado para ingressar no mundo do trabalho quando se formou:
                            <span><?php echo $dados['preparado']; ?></span>
                        </p><br>

                        <p>As temáticas e/ou assuntos abordados nos componentes curriculares cursados durante a graduação contribuíram para o exercício profissional:
                            <span><?php echo $dados['utilidade']; ?></span>
                        </p><br>

                        <p>O estágio curricular facilitou/colaborou com a inserção no mundo do trabalho:
                            <span><?php echo $dados['estagioContribuiuEmprego']; ?></span>
                        </p><br>

                        <p>Recebeu orientação, no âmbito do seu respectivo curso, para atuar no mercado de trabalho:
                            <span><?php echo $dados['recebeuOrientacao']; ?></span>
                        </p><br>

                        <p>Resumo da situação profissional:
                            <span><?php echo $dados['resumoSituacaoProfissional']; ?></span>
                        </p><br>

                    </fieldset>


                    <fieldset>

                        <legend><strong>RELAÇÃO COM A UNIVERSIDADE</strong></legend><br>

                        <p>Tem mantido algum contato com a UFPA após a formatura da graduação:
                            <span><?php echo $dados['relacaoUfpa']; ?></span>
                        </p><br>

                    </fieldset>

                    <fieldset>
                        <legend><strong>SATISFAÇÃO COM A INSTITUIÇÃO E COM O CURSO</strong></legend>

                        <P>Nível de satisfação com a UFPA:
                            <span><?php echo $dados['satisfacaoComUFPA'] ?></span>
                        </P><br>

                        <P>Grau de satisfação geral com a UFPA:
                            <span><?php echo $dados['grauSatisfacaoComUFPA'] ?></span>
                        </P><br>

                        <P>Nível de satisfação com o curso de graduação concluído:
                            <span><?php echo $dados['satisfacaoCurso'] ?></span>
                        </P><br>

                        <P>Em que aspecto o curso tem que melhorar:
                            <span><?php echo $dados['melhorarApectos'] ?></span>
                        </P><br>

                        <?php if (!empty($dados['outrosApectos'])) : ?>
                            <p>Descrição após ter marcado a opção "outros" na pergunta anterior: </p>
                            <span><?php echo $dados['outrosApectos']; ?></span>
                            </p><br>
                        <?php endif; ?>

                        <P>Você recomendaria seu curso para outra pessoa:
                            <span><?php echo $dados['recomendacao'] ?></span>
                        </P><br>

                        <?php if (!empty($dados['comentaRecomendacao'])) : ?>
                            <p>Comentario sobre a pergunta anterior: </p>
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
