<?php
include_once 'dadosEgresso.php';
definirDadosSessao();
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Formulário - Egressos</title>
	</head>

	<header>
        <div id="navbar">
            <!---<div class="resp">--->
            <a href="https://egressos.ufpa.br/" class="logo">
                <img src="images/logo_ufpa.png">
            </a>
            <h1>
                <strong>Formulário de Egressos UFPA</strong>
            </h1>
            <button class="return"><strong><a href="validaCpf.php"><p style="font-size: larger;" class="link">🢀</p></a></strong></button>
        </div>
    </header>

	<body>
		<main class="area-principal-pai">			
		<div id="area-principal">
			<!-- <form onsubmit="return validaFormulario()" action="salvaQuestionario.php" method="post" name="resposta"> -->
			<form action="salvaQuestionario.php" method="post" name="resposta">

				<!-- <h3>Perfil sócio demográfico: caracterização contextual do público pesquisado</h3> -->

				<fieldset>
					<!-- --------------------------------------------------------------- -->
					<legend><strong>DADOS PESSOAIS</strong></legend>
					<div class="dados">
						<p>Nome: <span><?php echo $_SESSION['nome'];?></span></p>
						<!--<p>Data de preenchimento do formulário: <span><?php //echo $_SESSION['dataResposta'];?></span></p>-->
						<!--<p>Email: <span><?php //echo $_SESSION['email'];?></span></p>-->
						<!--<p>2. Data de Nascimento: <span><?php //echo $_SESSION['dataNascimento'];?></span></p>-->
						<!--<p>Idade: <span><?php //echo $_SESSION['idade'];?></span></p>-->
						<p>Faixa Etária: <span><?php echo $_SESSION['faixaEtaria'];?></span></p>
						<p>Email: <span><input size=26 placeholder="Digite seu e-mail" type="email" id="email" name="email" required></span></p>
					</div>
					<!-- --------------------------------------------------------------- -->
					
					
					<div class="pergunta">
						<div>
							<label style="font-size: larger; max-width: cal(100% - 98px);">Gênero: </label>
							<select id="genero" name="genero">
								<option>Selecione</option>
								<option value="Masculino">Masculino</option>
								<option value="Feminino">Feminino</option>
								<option value="Outro">Outro</option>
							</select>
						</div>
					</div>
						
					<div class="dados">
						<div>
						<p>Cor: <span><?php echo $_SESSION['cor'];?></span></p>
						</div>
					</div>
					<!-- --------------------------------------------------------------- -->
				</fieldset>

				<fieldset>
					<!-- --------------------------------------------------------------- -->
					<legend><strong>DADOS ACADÊMICOS</strong></legend>
					<div class="dados">
						<p>Curso: <span><?php echo $_SESSION['curso'];?></span></p>
						<p>Unidade Acadêmica: <span><?php echo $_SESSION['unidadeAcademica'];?></span></p>
						<p>Campus: <span><?php echo $_SESSION['campus'];?></span></p>
						<p>Ano de Ingresso: <span><?php echo $_SESSION['anoIngresso'];?></span></p>
						<p>Ano de Conclusão: <span><?php echo $_SESSION['anoFormatura'];?></span></p>
						<p>Forma Ingresso: <span><?php echo $_SESSION['formaIngresso'];?></span></p>
						<p>Cota: <span><?php echo $_SESSION['cota'];?></span></p>
					</div>
					
					<!-- --------------------------------------------------------------- -->
					<div class="pergunta">
						<p>1. Obteve bolsa durante o curso?</p>
						<div class="radio">
							<input type="radio" name="bolsa" id="bolsa1" value="Sim" onclick="recebeBolsa()">
							<label for="bolsa1">Sim</label><br>
							<input type="radio" name="bolsa" id="bolsa2" value="Não" onclick="recebeBolsa()">
							<label for="bolsa2">Não</label><br>
						</div>
					</div>

                    <div class= "dependente">
                        <div class="pergunta">
                            <p>2. Se sim, qual(is)?</p>
                            <div class="checkbox">
                                <input type="checkbox" name="iniciacaoCientifica" value="Bolsa de Iniciação Científica" disabled> 
                                <label for="iniciacaoCientifica">Bolsa de Iniciação Científica</label><br>
  								<input type="checkbox" name="extensao" value="Bolsa de Extensão" disabled>
  								<label for="extensao">Bolsa de Extensão</label><br>
  								<input type="checkbox" name="iniciacaoDocencia" value="Bolsa de Iniciação à Docência" disabled> 
                                <label for="iniciacaoDocencia">Bolsa de Iniciação à Docência</label><br>
  								<input type="checkbox" name="residenciaPedagogica" value="Residência Pedagógica" disabled>
  								<label for="residenciaPedagogica">Residência Pedagógica</label><br>
  								<input type="checkbox" name="pet" value="PET" disabled> 
                                <label for="pet">PET</label><br>
  								<input type="checkbox" name="monitoria" value="Monitoria" disabled>
  								<label for="monitoria">Monitoria</label><br>
  								<input type="checkbox" name="tutoria" value="Tutoria" disabled> 
                                <label for="tutoria">Tutoria</label><br>
                                <input type="checkbox" name="assitenciaEstudantil" value="Bolsa de assistência estudantil (auxílio moradia, permanência, etc)" disabled> 
                                <label for="assitenciaEstudantil">Bolsa de assistência estudantil (auxílio moradia, permanência, etc)</label><br>
                                <input type="checkbox" name="bolsaEstagio" value="Bolsa de estágio" disabled> 
                                <label for="bolsaEstagio">Bolsa de estágio</label><br>
                                <input type="checkbox" name="outras" value="Outras" disabled> 
                                <label for="outras">Outras Bolsas</label><br>
                            </div>
                        </div>
                    </div>
					<!-- --------------------------------------------------------------- -->
				
					<div class="pergunta">
						<p>3. Participou de atividades acadêmicas extracurriculares durante o curso?</p>
						<div class="radio">
							<input type="radio" name="atividadeExtracurriculares" id="bolsa1" value="Sim" onclick="atividadeExtraCurricular()">
							<label for="atividadeExtra1">Sim</label><br>
							<input type="radio" name="atividadeExtracurriculares" id="bolsa2" value="Não" onclick="atividadeExtraCurricular()">
							<label for="atividadeExtra2">Não</label><br>
						</div>
					</div>	
					<div class="dependente">	
						<div class= "pergunta">
							<p>4. Se sim, qual(is)?</p>
							<div class="checkbox">
								<input type=checkbox id="iniciacaoCientifica2" name="iniciacaoCientifica2" disabled>
								<label for="iniciacaoCientifica2">Iniciação Científica (PIBIC e/ou outros)</label><br>
    							<input type=checkbox id="monitoria2" name="monitoria2" disabled>
    							<label for="monitoria2">Monitoria</label><br>
    							<input type=checkbox id="tutoria2" name="tutoria2" disabled>
    							<label for="tutoria2">Tutoria</label><br>
    							<input type=checkbox id="pet2" name="pet2" disabled>
    							<label for="pet2">PET</label><br>
    							<input type=checkbox id="pibid2" name="pibid2" disabled>
    							<label for="pibid2">PIBID</label><br>
    							<input type=checkbox id="pibex2" name="pibex2" disabled>
    							<label for="pibex2">PIBEX</label><br>
    							<input type=checkbox id="residenciaPedagogica2" name="residenciaPedagogica2" disabled>
    							<label for="residenciaPedagogica2">Residência Pedagógica</label><br>
    							<input type=checkbox id="estagioNaoObrigatorio2" name="estagioNaoObrigatorio2" disabled>
    							<label for="estagioNaoObrigatorio2">Estágio não obrigatório (Bolsa PROAD)</label><br>
    							<input type=checkbox id="atividadeComunidade2" name="atividadeComunidade2" disabled>
    							<label for="atividadeComunidade2">Atividade Curricular em Comunidade</label><br>
    							<input type=checkbox id="participouDeEventos2" name="participouDeEventos2" disabled>
    							<label for="participouDeEventos2">Eventos: Congressos, Seminários, etc</label><br>
    							<input type=checkbox id="empresaJunior2" name="empresaJunior2" disabled>
    							<label for="empresaJunior2">Empresa Júnior</label><br>
    							<input type=checkbox id="diretorioAcademico2" name="diretorioAcademico2" disabled>
    							<label for="diretorioAcademico2">Diretório Acadêmico</label><br>
    							<input type=checkbox id="outrasAtividades2" name="outrasAtividades2" disabled>
    							<label for="outrasAtividades2">Outras atividades</label><br>
							</div>
						</div>
					</div>
					
					<div class="pergunta">
						<p>5. Durante o curso de graduação, você exerceu atividade remunerada, incluindo Estágio não obrigatório?</p>
						<div class="radio">
							<input type="radio" name="atividadeRemunerada" id="atividadeRemunerada1" value="Durante todo o período do curso">
							<label for="atividadeRemunerada1">Durante todo o período do curso</label><br>
							<input type="radio" name="atividadeRemunerada" id="atividadeRemunerada2" value="Na maior parte do curso">
							<label for="atividadeRemunerada2">Em boa parte do período do curso</label><br>							
							<input type="radio" name="atividadeRemunerada" id="atividadeRemunerada3" value="Por pouco tempo na trajetória do curso">
							<label for="atividadeRemunerada3">Por pouco tempo na trajetória do curso</label><br>
							<input type="radio" name="atividadeRemunerada" id="atividadeRemunerada4" value="Não exerci atividade remunerada durante o período do curso">
							<label for="atividadeRemunerada4">Não exerci atividade remunerada durante o período do curso</label><br>
						</div>
					</div>
					
					<div class="pergunta">
						<p>6. Durante o curso de graduação participou de algum programa voltado à mobilidade acadêmica?</p>
						<div class="radio">
							<input type="radio" name="mobilidadeAcademica" id="mobilidadeAcademica1" value="Todo o período do curso">
							<label for="mobilidadeAcademica1">Sim, participei de programa de mobilidade acadêmica nacional</label><br>
							<input type="radio" name="mobilidadeAcademica" id="mobilidadeAcademica2" value="Na maior parte do curso">
							<label for="mobilidadeAcademica2">Sim, participei de programa de mobilidade acadêmica internacional</label><br>							
							<input type="radio" name="mobilidadeAcademica" id="mobilidadeAcademica3" value="Por pouco tempo na trajetória do curso">
							<label for="mobilidadeAcademica3">Sim, participei de programa de mobilidade acadêmica nacional e internacional</label><br>
							<input type="radio" name="mobilidadeAcademica" id="mobilidadeAcademica4" value="Não">
							<label for="mobilidadeAcademica4">Não participei de programa de mobilidade acadêmica</label><br>
						</div>
					</div>

					<div class="pergunta">
						<div>
						<label style="font-size: larger; max-width: cal(100% - 98px);">7. Após a graduação, qual o nível do último curso de pós-graduação realizado e/ou em andamento?</label>
							<select name="cursoPosGraduacao" id="cursoPosGraduacao" onchange="posGraduacao()">
								<option>Selecione</option>
								<option value="Especialização">MBA/Especialização</option>
								<option value="Mestrado">Mestrado</option>
								<option value="Doutorado">Doutorado</option>
                                <option value="Nenhum">Nenhum</option>
							</select>
						</div>
					</div>

                    <div class="dependente1">
                    	<div class="pergunta">
							<p>8. Em qual instituição você cursou ou está cursando o último curso de pós-graduação que se refere a pergunta anterior?</p>
							<div class="radio">
								<input type="radio" name="posGraduacaoUfpa" id="posGraduacaoUfpa1" value="UFPA">
								<label for="posGraduacaoUfpa1">UFPA</label><br>
								<input type="radio" name="posGraduacaoUfpa" id="posGraduacaoUfpa2" value="Outra Instituição localizada no Brasil">
								<label for="posGraduacaoUfpa2">Outra Instituição localizada no Brasil</label><br>
								<input type="radio" name="posGraduacaoUfpa" id="posGraduacaoUfpa1" value="Instituição localizada no exterior">
								<label for="posGraduacaoUfpa1">Instituição localizada no exterior</label><br>
							</div>
						</div>
					</div>
					<!-- --------------------------------------------------------------- -->
				</fieldset>

				<fieldset>
					<!-- --------------------------------------------------------------- -->
					<legend><strong>SITUAÇÃO PROFISSIONAL</strong></legend>

					<div class="pergunta">
						<p>9. Você está exercendo atividade profissional atualmente?</p>
						<div class="radio">
							<input type="radio" onclick="trabalho('Sim, na área de minha formação acadêmica')" name="inseridoNoMercado" id="inseridoNoMercado1"
							value="Sim, na área de minha formação acadêmica">
							<label for="inseridoNoMercado1">Sim, na área de minha formação acadêmica</label><br>
							<input type="radio" onclick="trabalho('Sim, em área afim a de minha formação acadêmica')" name="inseridoNoMercado" id="inseridoNoMercado2"
							value="Sim, em área afim a de minha formação acadêmica">
							<label for="inseridoNoMercado2">Sim, em área afim a de minha formação acadêmica</label><br>
							<input type="radio" onclick="trabalho('Sim, fora da área de minha formação acadêmica')" name="inseridoNoMercado" id="inseridoNoMercado3"
							value="Sim, fora da área de minha formação acadêmica">
							<label for="inseridoNoMercado3">Sim, fora da área de minha formação acadêmica</label><br>
							<input type="radio" onclick="trabalho('Não, mas já exerci na área de minha formação acadêmica')" name="inseridoNoMercado" id="inseridoNoMercado4"
							value="Não, mas já exerci na área de minha formação acadêmica">
							<label for="inseridoNoMercado4">Não, mas já exerci na área de minha formação acadêmica</label><br>
							<input type="radio" onclick="trabalho('Não, mas já exerci fora da área de minha formação acadêmica')" name="inseridoNoMercado" id="inseridoNoMercado5"
							value="Não, mas já exerci fora da área de minha formação acadêmica">
							<label for="inseridoNoMercado5">Não, mas já exerci fora da área de minha formação acadêmica</label><br>
							<input type="radio" onclick="trabalho('Não, e nunca exerci')" name="inseridoNoMercado" id="inseridoNoMercado6"
							value="Não, e nunca exerci">
							<label for="inseridoNoMercado6">Não, e nunca exerci</label><br>
						</div>
					</div>
					
					<div class="dependente2">
						<div class="pergunta">
							<p>10. Em que tipo de organização você exerce sua atividade profissional, principalmente?</p>
							<div class="radio">
								<input type="radio" id="tipoDeEmprego1" name="tipoDeEmprego" value="Empresa própria e/ou autônomo">
								<label for="tipoDeEmprego1">Empresa própria e/ou autônomo</label><br>
								<input type="radio" id="tipoDeEmprego2" name="tipoDeEmprego" value="Empresa privada com CTPS">
								<label for="tipoDeEmprego2">Empresa privada com CTPS</label><br>
								<input type="radio" id="tipoDeEmprego3" name="tipoDeEmprego" value="Empresa privada sem CTPS">
								<label for="tipoDeEmprego3">Empresa privada sem CTPS</label><br>
								<input type="radio" id="tipoDeEmprego4"	name="tipoDeEmprego" value="Empresa pública/órgão público concursado">
								<label for="tipoDeEmprego4">Empresa pública/órgão público concursado</label><br>
								<input type="radio" id="tipoDeEmprego5"	name="tipoDeEmprego" value="Empresa pública/órgão público temporário">
								<label for="tipoDeEmprego5">Empresa pública/órgão público temporário</label><br>
								<input type="radio" id="tipoDeEmprego6"	name="tipoDeEmprego" value="Terceiro Setor (Organização não governamental, movimento social, Associações, etc)">
								<label for="tipoDeEmprego6">Terceiro Setor (Organização não governamental, movimento social, Associações, etc)</label><br>						
								
							</div>
						</div>
					</div>
					<div class="dependente3">
						<div class="pergunta">
							<p>11. Qual o principal motivo pelo qual você não exerce/exerceu atividade profissional na sua área de formação?</p>
							<div class="radio">
								<input type="radio" id="motivo1" name="motivo" value="Financeiramente desestimulador">
								<label for="motivo1">Financeiramente desestimulador</label><br>
								<input type="radio" id="motivo2" name="motivo" value="Mercado de trabalho saturado">
								<label for="motivo2">Mercado de trabalho saturado</label><br>
								<input type="radio" id="motivo3" name="motivo" value="Falta de oportunidade">
								<label for="motivo3">Falta de oportunidade</label><br>
								<input type="radio" id="motivo4"	name="motivo" value="Melhor oportunidade em outra área">
								<label for="motivo4">Melhor oportunidade em outra área</label><br>
								<input type="radio" id="motivo5"	name="motivo" value="Empresa pública/órgão público concursado">
								<label for="motivo5">Outro motivo</label><br>
																
							</div>
						</div>
					</div>
					<div class="dependente4">
						<div class="pergunta">
							<p>12. Depois de quanto tempo após a formatura ingressou no mundo do trabalho?</p>
							<div class="radio">
								<input type=radio id="tempoFormaturaEmprego1" name="tempoFormaturaEmprego" value="0 a 6 meses">
								<label for="tempoFormaturaEmprego1">0 a 6 meses</label><br>
								<input type=radio id="tempoFormaturaEmprego2" name="tempoFormaturaEmprego" value="7 a 12 meses">
								<label for="tempoFormaturaEmprego2">7 a 12 meses</label><br>
								<input type=radio id="tempoFormaturaEmprego3" name="tempoFormaturaEmprego" value="mais de 12 meses">
								<label for="tempoFormaturaEmprego3">mais de 12 meses</label><br>
								<input type=radio id="tempoFormaturaEmprego4" name="tempoFormaturaEmprego" value="já trabalhava na área">
								<label for="tempoFormaturaEmprego4">já trabalhava</label><br>
							</div>
						</div>
				  </div>
				  
				  <div class="dependente5">
						<div class="pergunta">
							<p>13. Qual sua faixa salarial (caso esteja inserido no mundo do trabalho)?</p>
							<div class="radio">
								<input type=radio id="faixaSalarial1" name="faixaSalarial" value="1 a 2 salários mínimos">
								<label for="faixaSalarial1">1 a 2 salários mínimos</label><br>
								<input type=radio id="faixaSalarial2" name="faixaSalarial" value="3 a 5 salários mínimos">
								<label for="faixaSalarial2">3 a 5 salários mínimos</label><br>
								<input type=radio id="faixaSalarial3" name="faixaSalarial" value="6 a 10 salários">
								<label for="faixaSalarial3">6 a 10 salários</label><br>
								<input type=radio id="faixaSalarial4" name="faixaSalarial" value="Mais de 10 salários">
								<label for="faixaSalarial4">Mais de 10 salários</label><br>
								<input type=radio id="faixaSalarial5" name="faixaSalarial" value="Não estou inserido(a) no mundo do trabalho">
								<label for="faixaSalarial5">Não estou inserido(a) no mundo do trabalho</label><br>
							</div>
						</div>
					</div>	
						
						<div class="pergunta">
							<p>15. Você estava preparado para ingressar no mundo do trabalho quando se formou?</p>
							<div class="radio">
								<input type="radio" id="preparado1" name="preparado" value="Sim, muito">
								<label for="preparado1">Sim, muito</label><br>
								<input type="radio" id="preparado2" name="preparado" value="Sim, razoavelmente">
								<label for="preparado2">Sim, razoavelmente</label><br>
								<input type="radio" id="preparado3" name="preparado" value="Sim, um pouco">
								<label for="preparado3">Sim, um pouco</label><br>
								<input type="radio" id="preparado4" name="preparado" value="Não">
								<label for="preparado4">Não</label><br>
							</div>
						</div>
						
						
						<div class="pergunta">
							<p>16. As temáticas e/ou assuntos abordados nas várias disciplinas cursadas	tiveram utilidade para o exercício profissional?</p>
							<div class="radio">
								<input type="radio" id="utilidade1" name="utilidade" value="Sim, muito">
								<label for="utilidade1">Sim, muito</label><br>
								<input type="radio" id="utilidade2" name="utilidade" value="Sim, razoavelmente">
								<label for="utilidade2">Sim, razoavelmente</label><br>
								<input type="radio" id="utilidade3" name="utilidade" value="Sim, um pouco">
								<label for="utilidade3">Sim, um pouco</label><br>
								<input type="radio" id="utilidade4" name="utilidade" value="Não">
								<label for="utilidade4">Não</label><br>
							</div>
						</div>
					<div class="dependente7">
						<div class="pergunta">
							<p>17. O estágio curricular facilitou/colaborou com a inserção no mundo do trabalho?</p>
							<div class="radio">
								<input type="radio" id="estagioContribuiuEmprego1" name="estagioContribuiuEmprego" value="Sim, muito">
								<label for="estagioContribuiuEmprego1">Sim, muito</label><br>
								<input type="radio" id="estagioContribuiuEmprego2" name="estagioContribuiuEmprego" value="Sim, razoavelmente">
								<label for="estagioContribuiuEmprego2">Sim, razoavelmente</label><br>
								<input type="radio" id="estagioContribuiuEmprego3" name="estagioContribuiuEmprego" value="Sim, um pouco">
								<label for="estagioContribuiuEmprego3">Sim, um pouco</label><br>
								<input type="radio" id="estagioContribuiuEmprego4" name="estagioContribuiuEmprego" value="Não">
								<label for="estagioContribuiuEmprego4">Não</label><br>
							</div>
						</div>
					</div>

					<div class="pergunta">
						<p>18. Recebeu orientação, no âmbito do seu respectivo curso, para atuar no mercado de trabalho?</p>
						<div class="radio">
							<input type="radio" id="recebeuOrientacao1" name="recebeuOrientacao" value="Sim">
							<label for="recebeuOrientacao1">Sim</label><br>
							<input type="radio" id="recebeuOrientacao2" name="recebeuOrientacao" value="Não">
							<label for="recebeuOrientacao2">Não</label><br>
						</div>
					</div>

					<p>19. Comente:</p>

					<textarea name="resumoSituacaoProfissional" cols=40 rows=6 
					placeholder="Descreva mais sobre sua situação profissional"
					></textarea>
					<!-- --------------------------------------------------------------- -->
				</fieldset>


				<fieldset>
				<legend><strong>RELAÇÃO COM A INSTITUIÇÃO</strong></legend>
				<!-- --------------------------------------------------------------- -->
				<div class="pergunta">
						<p>20. Você tem mantido algum contato com a UFPA após a formatura da graduação?</p>
						<div class="radio">
							<input type="radio" id="relacaoUfpa1" name="relacaoUfpa" value="Sim, participo de eventos acadêmicos promovidos pela UFPA">
							<label for="relacaoUfpa1">Sim, participo de eventos acadêmicos promovidos pela UFPA</label><br>
							<input type="radio" id="relacaoUfpa2" name="relacaoUfpa" value="Sim, participo de grupos de pesquisa e/ou projetos de extensão/ensino vinculados a UFPA">
							<label for="relacaoUfpa2">Sim, participo de grupos de pesquisa e/ou projetos de extensão/ensino vinculados a UFPA</label><br>
							<input type="radio" id="relacaoUfpa3" name="relacaoUfpa" value="Sim, como palestrante convidado">
							<label for="relacaoUfpa3">Sim, como palestrante convidado</label><br>
							<input type="radio" id="relacaoUfpa4" name="relacaoUfpa" value="Sim, como aluno de pós-graduação">
							<label for="relacaoUfpa4">Sim, como aluno de pós-graduação</label><br>
							<input type="radio" id="relacaoUfpa5" name="relacaoUfpa" value="Nenhum, mas tenho interesse">
							<label for="relacaoUfpa5">Nenhum, mas tenho interesse</label><br>
							<input type="radio" id="relacaoUfpa6" name="relacaoUfpa" value="Nenhum">
							<label for="relacaoUfpa6">Nenhum</label><br>										
						</div>
					</div class="pergunta">
				
				
				<!-- --------------------------------------------------------------- -->
				</fieldset>
				
				<fieldset>
					
					<legend><strong>NÍVEL DE SATISFAÇÃO COM A UFPA E COM O CURSO</strong></legend>
					<!-- --------------------------------------------------------------- -->
					<div class="pergunta">
						<p>21. Marque a alternativa referente ao nível de satisfação com a UFPA:</p>
						<div class="radio">
							<input type="radio" id="satisfacaoComUFPA1" name="satisfacaoComUFPA" value="Muito Satisfeito">
							<label for="satisfacaoComUFPA1">Muito Satisfeito</label><br>
							<input type="radio" id="satisfacaoComUFPA2" name="satisfacaoComUFPA" value="Satisfeito">
							<label for="satisfacaoComUFPA2">Satisfeito</label><br>
							<input type="radio" id="satisfacaoComUFPA3" name="satisfacaoComUFPA" value="Pouco Satisfeito">
							<label for="satisfacaoComUFPA3">Pouco Satisfeito</label><br>
							<input type="radio" id="satisfacaoComUFPA4" name="satisfacaoComUFPA" value="Insatisfeito">
							<label for="satisfacaoComUFPA4">Insatisfeito</label><br>
						</div>
					</div class="pergunta">

					

					<div class="pergunta">
						<p>22. Marque a alternativa referente ao nível de satisfação com o curso de graduação concluído:</p>
						<div class="radio">
							<input type="radio" id="satisfacaoCurso1" name="satisfacaoCurso" value="Muito Satisfeito">
							<label for="satisfacaoCurso1">Muito Satisfeito</label><br>
							<input type="radio" id="satisfacaoCurso2" name="satisfacaoCurso" value="Satisfeito">
							<label for="satisfacaoCurso2">Satisfeito</label><br>
							<input type="radio" id="satisfacaoCurso3" name="satisfacaoCurso" value="Pouco Satisfeito">
							<label for="satisfacaoCurso3">Pouco Satisfeito</label><br>
							<input type="radio" id="satisfacaoCurso4" name="satisfacaoCurso" value="Insatisfeito">
							<label for="satisfacaoCurso4">Insatisfeito</label><br>
						</div>
					</div class="pergunta">
					
					<div class="pergunta">
						<p>23. Na sua opinião, em quais aspectos o curso poderia melhorar?</p>
						<div class="checkbox">
							<input type="checkbox" id="melhorarApectos1" name="melhorarApectos1" value="Recursos didáticos-pedagógico" onclick="melhorar()">
							<label for="melhorarApectos1">Recursos didáticos-pedagógico</label><br>
							<input type="checkbox" id="melhorarApectos2" name="melhorarApectos2" value="Conteúdos Curriculares" onclick="melhorar()">
							<label for="melhorarApectos2">Conteúdos Curriculares</label><br>
							<input type="checkbox" id="melhorarApectos3" name="melhorarApectos3" value="Metodologia de Ensino" onclick="melhorar()">
							<label for="melhorarApectos3">Metodologia de Ensino</label><br>
							<input type="checkbox" id="melhorarApectos4" name="melhorarApectos4" value="Atualização do acervo da biblioteca" onclick="melhorar()">
							<label for="melhorarApectos4">Atualização do acervo da biblioteca</label><br>
							<input type="checkbox" id="melhorarApectos5" name="melhorarApectos5" value="Carga horária do curso" onclick="melhorar()">
							<label for="melhorarApectos5">Carga horária do curso</label><br>
							<input type="checkbox" id="melhorarApectos6" name="melhorarApectos6" value="Qualidade do corpo docente" onclick="melhorar()">
							<label for="melhorarApectos6">Qualidade do corpo docente</label><br>
							<input type="checkbox" id="melhorarApectos7" name="melhorarApectos7" value="Espaço Físico" onclick="melhorar()">
							<label for="melhorarApectos7">Espaço Físico</label><br>
							<input type="checkbox" id="melhorarApectos8" name="melhorarApectos8" value="Recursos audiovisuais e tecnológicos" onclick="melhorar()">
							<label for="melhorarApectos8">Recursos audiovisuais e tecnológicos</label><br>
							<input type="checkbox" id="melhorarApectos9" name="melhorarApectos9" value="Laboratórios de ensino" onclick="melhorar()">
							<label for="melhorarApectos9">Laboratórios de ensino</label><br>
							<input type="checkbox" id="melhorarApectos10" name="melhorarApectos10" value="Melhor preparação para o mundo do trabalho" onclick="melhorar()">
							<label for="melhorarApectos10">Melhor preparação para o mundo do trabalho</label><br>
							<input type="checkbox" id="melhorarApectos11" name="melhorarApectos11" value="Outros" onclick="melhorar()">
							<label for="melhorarApectos11">Outros</label><br>					
						</div>
					</div class="pergunta">
					
					<div class="dependente6">
						<div class="pergunta">
							<p>24. Caso tenha marcado a opção “Outros” na pergunta anterior, descreva:</p>
							<textarea name="outrosApectos" cols=40 rows=6 placeholder="Descreva outros aspectos" disabled></textarea>
						</div>						
					</div>
					
					<div class="pergunta">
						<p>25. Você recomendaria seu curso para outra pessoa?</p>
						<div class="radio">
							<input type="radio" id="recomendacao1" name="recomendacao" value="Sim">
							<label for="recomendacao1">Sim</label><br>
							<input type="radio" id="recomendacao2" name="recomendacao" value="Não">
							<label for="recomendacao2">Não</label><br>					
						</div>
					</div class="pergunta">
					
					<div class="pergunta">
							<p>26. Comente sobre a pergunta anterior:</p>
							<textarea name="comentaRecomendacao" cols=40 rows=6 placeholder="Comente sobre a recomendação"></textarea>
					</div>
					
					
					<!-- --------------------------------------------------------------- -->
				</fieldset>

									
					
				<input class="submeter" type="submit" name="botaoConfirmar" id="botaoConfirmar" value="Enviar Resposta" onclick="envioSucesso(event)">										
			</form>
		</div>	
		</main>
			<footer>
				<hr>
				<a>Copyright @ 2023 Portal do Egresso da Universidade Federal do Pará</a>
			</footer> 
			<script src="validaPergunta.js"></script>			
			<script src="validaFormulario.js"></script>	
		
	</body>
<html>