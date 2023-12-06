
/******************************************** FORMAÇÃO ******************************************/
function recebeBolsa() {
  var resposta = document.querySelector('input[name="bolsa"]:checked').value;
  var checkboxes = document.querySelectorAll('.checkbox input[name="iniciacaoCientifica"],input[name="extensao"],input[name="iniciacaoDocencia"],input[name="residenciaPedagogica"],input[name="pet"],input[name="monitoria"],input[name="tutoria"],input[name="assitenciaEstudantil"],input[name="bolsaEstagio"],input[name="outras"]');

  
    
  if (resposta === 'Não') {
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].disabled = true;
      checkboxes[i].nextElementSibling.style.opacity = 0.5;     
    }
  } else {
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].disabled = false;
      checkboxes[i].nextElementSibling.style.opacity = 1;
    }
  }
}



/************************************** DADOS COMPLEMENTARES *************************************/

function atividadeExtraCurricular() {
 var resposta = document.querySelector('input[name="atividadeExtra"]:checked').value;
 var checkboxes = document.querySelectorAll('.checkbox input[id="iniciacaoCientifica2"],input[id="monitoria2"],input[id="pet2"],input[id="pibid2"],input[id="pibex2"],input[id="residenciaPedagogica2"],input[id="estagioNaoObrigatorio2"],input[id="atividadeComunidade2"],input[id="participouDeEventos2"],input[id="empresaJunior2"],input[id="diretorioAcademico2"],input[id="outrasAtividades2"]');

    
  if (resposta === 'Não') {
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].disabled = true;
      checkboxes[i].nextElementSibling.style.opacity = 0.5;     
    }
  } else {
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].disabled = false;
      checkboxes[i].nextElementSibling.style.opacity = 1;
    }
  }
}

function posGraduacao() {
  let select = document.getElementById('cursoPosGraduacao');
  let statusInputs = document.querySelectorAll('input[name = situacaoCursoPosGraduacao], input[name = posGraduacaoUfpa]')
  let labels = document.querySelectorAll('.dependente1 label, .dependente1 p')

  statusInputs.forEach( input => {
    if(select.value == "Nenhum") {
      input.disabled = true;
    } else {
      input.disabled = false;
    }
    
  });

  labels.forEach(label => {
    if (select.value == "Nenhum") {
      label.classList.add('desabilitado1');
    } else {
      label.classList.remove('desabilitado1');
    }
  });

}

/****************************************** SITUAÇÃO PROFISSIONAL  ****************************************/

function trabalho(empregado) {
  let inputs = document.querySelectorAll('input[name=tipoDeEmprego], input[name=tempoFormaturaEmprego], input[name=trabalhaNaAreaDeFormacao], input[name=faixaSalarial], input[name=relacaoCursoTrabalho], input[name=disciplinasForamUteis], input[name=estagioContribuiuEmprego], input[name=motivo]');
  let labels = document.querySelectorAll('.dependente2 label, .dependente2 p')
  
  inputs.forEach(input => {
    if (empregado === 'Não, e nunca exerci') {
      input.disabled = true;
    } else {
      input.disabled = false;
    }
  });

  labels.forEach(label => {
    if (empregado === 'Não, e nunca exerci') {
      label.classList.add('desabilitado2');
    } else {
      label.classList.remove('desabilitado2');
    }
  });
}


/*************************************NÍVEL DE SATISFAÇÃO COM A UFPA E COM O CURSO *************************************/
function melhorar() {

  let participa = document.querySelector('input[name="melhorarApectos"][value="Outros"]');
  let textarea = document.querySelector('textarea[name=outrosApectos]');
  let p = document.querySelector('.dependente6 p');

  if (participa.checked == true) {
    textarea.disabled = false;
    textarea.style.opacity = 1;
    p.classList.add('desabilitado6');
  } else {
    textarea.disabled = true;
    p.classList.remove('desabilitado6');
    textarea.style.opacity = 0.5;
  }
}


/************************************* RELAÇÃO ATUAL COM A UNIVERSIDADE *************************************/

function eventos() {

  let participa = document.querySelector('input[name="participaDeEventos"][value="Não"]');
  let textarea = document.querySelector('textarea[name=resumoEventosAtuais]');
  let p = document.querySelector('.dependente3 p');

  if (participa.checked == true) {
    textarea.disabled = true;
    textarea.style.opacity = 0.5;
    p.classList.add('desabilitado3');
  } else {
    textarea.disabled = false;
    textarea.style.opacity = 1;
    p.classList.remove('desabilitado3');
  }
}

function grupoPesquisa() {

  let projeto = document.querySelector('input[name="participaDeProjeto"][value="Não"]');
  let textarea = document.querySelector('textarea[name=resumoProjetosAtuais]');
  let p = document.querySelector('.dependente4 p');

  if (projeto.checked == true) {
    textarea.disabled = true;
    textarea.style.opacity = 0.5;
    p.classList.add('desabilitado4');
  } else {
    textarea.disabled = false;
    textarea.style.opacity = 1;
    p.classList.remove('desabilitado4');
  }
}

function curso() {

  let curso = document.querySelector('input[name="participaDeCurso"][value="Não"]');
  let textarea = document.querySelector('textarea[name=resumoCursosAtuais]');
  let p = document.querySelector('.dependente5 p');

  if (curso.checked == true) {
    textarea.disabled = true;
    textarea.style.opacity = 0.5;
    p.classList.add('desabilitado5');
  } else {
    textarea.disabled = false;
    textarea.style.opacity = 1;
    p.classList.remove('desabilitado5');
  }

}
