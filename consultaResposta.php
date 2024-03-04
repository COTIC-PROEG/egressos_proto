<?php
include_once 'dadosEgresso.php';

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
                            <span><?php $cpfZero = str_pad($dados['cpf'],11, '0', STR_PAD_LEFT); echo $cpfZero; ?></span>
                        </p><br>
                        <p>Nome: 
                            <span><?php echo $dados['nome']; ?></span>
                        </p><br>
                        <p>Data de preenchimento do formulário: 
                        	<span><?php echo $dados['dataResposta'];?></span>
                        </p><br>
                        <p>Email: 
                            <span><?php echo $dados['email']; ?></span>
                        </p><br>
                        <p>Data de Nascimento: 
                            <span><?php echo $dados['dataNascimento']; ?></span>
                        </p><br>
                        <p>Faixa Etária: 
                            <span> <?php echo $dados['faixaEtaria']; ?></span>
                        </p><br>                       
                        <p>Genero: 
                            <span><?php echo $dados['genero']; ?></span>
                        </p><br>
                        <p>Cor: 
                            <span><?php echo $dados['cor']; ?></span>
                        </p><br>

                    </fieldset>

                    <fieldset>

                        <legend><strong>DADOS ACADÊMICOS</strong></legend><br>

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
                        <p>Cota: 
                            <span><?php echo $dados['cota']; ?></span>
                        </p><br>
                        <p>Unidade Acadêmica: 
                            <span><?php echo $dados['unidadeAcademica']; ?></span>
                        </p><br>
                        <p>Campus: 
                            <span><?php echo $dados['campus']; ?></span>
                        </p><br>
                        <p>1. Obteve bolsa durante o curso? 
                            <span><?php echo $dados['bolsa']; ?></span>
                        </p><br>
                        <?php if (!empty($dados['tipoBolsa'])) : ?>
                            <p>2. Se sim, qual(is)? 
                            <span><?php echo $dados['tipoBolsa']; ?></span>
                            </p><br>
                        <?php endif; ?>

                    

                        <?php if (!empty($dados['atividadesExtracurriculares'])) : ?>
                            <p>3. Participou de atividades acadêmicas extracurriculares durante o curso?
                                <span><?php echo $dados['atividadesExtracurriculares']; ?></span>
                            </p><br>
                        <?php endif; ?>
                        <?php if (!empty($dados['tipoAtividadeExtra'])) : ?>
                            <p>4. Se sim, qual(is)?
                                <span><?php echo $dados['tipoAtividadeExtra']; ?></span>
                            </p><br>
                        <?php endif; ?>

                        <p>5. Durante o curso de graduação, você exerceu atividade remunerada, incluindo Estágio não obrigatório?
                            <span><?php echo $dados['atividadeRemunerada']; ?></span>
                        </p><br>

                        <p>6. Durante o curso de graduação participou de algum programa voltado à mobilidade acadêmica?
                            <span><?php echo $dados['mobilidadeAcademica']; ?></span>
                        </p><br>

                        <p>7. Após a graduação, qual o nível do último curso de pós-graduação realizado e/ou em andamento? 
                            <span><?php echo $dados['cursoPosGraduacao']; ?></span>
                        </p><br>

						<p>8. Em qual instituição você cursou ou está cursando o último curso de pós-graduação que se refere a pergunta anterior? 
                            <span><?php echo $dados['posGraduacaoUfpa']; ?></span>
                        </p><br>
                        
                    </fieldset>

                    <fieldset>

                        <legend><strong>SITUAÇÃO PROFISSIONAL</strong></legend><br>

                        <p>9. Você está exercendo atividade profissional atualmente?
                            <span><?php echo $dados['inseridoNoMercado']; ?></span>
                        </p><br>

                        <p>10. Em que tipo de organização você exerce sua atividade profissional, principalmente?
                            <span><?php echo $dados['tipoDeEmprego']; ?></span>
                        </p><br>

                        <p>11. Qual o principal motivo pelo qual você não exerce/exerceu atividade profissional na sua área de formação?
                            <span><?php echo $dados['motivo']; ?></span>
                        </p><br>

                        <p>12. Depois de quanto tempo após a formatura ingressou no mundo do trabalho?
                            <span><?php echo $dados['tempoFormaturaEmprego']; ?></span>
                        </p><br>

                        <p>13. Qual sua faixa salarial (caso esteja inserido no mundo do trabalho)?
                            <span><?php echo $dados['faixaSalarial']; ?></span>
                        </p><br>

                        <p>14. Você estava preparado para ingressar no mundo do trabalho quando se formou?
                            <span><?php echo $dados['preparado']; ?></span>
                        </p><br>

                        <p>15. As temáticas e/ou assuntos abordados nas várias disciplinas cursadas	tiveram utilidade para o exercício profissional?
                            <span><?php echo $dados['utilidade']; ?></span>
                        </p><br>

                        <p>16. O estágio curricular facilitou/colaborou com a inserção no mundo do trabalho?
                            <span><?php echo $dados['estagioContribuiuEmprego']; ?></span>
                        </p><br>

                        <p>17. Recebeu orientação, no âmbito do seu respectivo curso, para atuar no mercado de trabalho?
                            <span><?php echo $dados['recebeuOrientacao']; ?></span>
                        </p><br>

                        <p>18. Comentario sobre a pergunta anterior:
                            <span><?php echo $dados['resumoSituacaoProfissional']; ?></span>
                        </p><br>

                    </fieldset>


                    <fieldset>

                        <legend><strong>RELAÇÃO COM A INSTITUIÇÃO</strong></legend><br>

                        <p>19. Você tem mantido algum contato com a UFPA após a formatura da graduação?
                            <span><?php echo $dados['relacaoUfpa']; ?></span>
                        </p><br>

                    </fieldset>

                    <fieldset>
                        <legend><strong>NÍVEL DE SATISFAÇÃO COM A UFPA E COM O CURSO</strong></legend>

                        <P>20. Nível de satisfação com a UFPA:
                            <span><?php echo $dados['satisfacaoComUFPA'] ?></span>
                        </P><br>
<<<<<<< HEAD

                        <P>21. Nível de satisfação com o curso de graduação concluído:
=======
                        <P>Nível de satisfação com o curso de graduação concluído:
>>>>>>> 81efb02edd8722e209b935cd010881eabd702ca1
                            <span><?php echo $dados['satisfacaoCurso'] ?></span>
                        </P><br>

                        <P>22. Na sua opinião, em quais aspectos o curso poderia melhorar?
                            <span><?php echo $dados['melhorarApectos'] ?></span>
                        </P><br>

                        <?php if (!empty($dados['outrosApectos'])) : ?>
                            <p>23. Caso tenha marcado a opção “Outros” na pergunta anterior, descreva: </p>
                            <span><?php echo $dados['outrosApectos']; ?></span>
                            </p><br>
                        <?php endif; ?>

                        <P>24. Você recomendaria seu curso para outra pessoa?
                            <span><?php echo $dados['recomendacao'] ?></span>
                        </P><br>

                        <?php if (!empty($dados['comentaRecomendacao'])) : ?>
                            <p>25. Comentario sobre a pergunta anterior: </p>
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
