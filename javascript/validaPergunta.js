
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
  var resposta = document.querySelector('input[name="atividadeExtracurriculares"]:checked').value;
  var checkboxes = document.querySelectorAll('.checkbox input[id="iniciacaoCientifica2"],input[id="monitoria2"],input[id="pet2"],input[id="pibid2"],input[id="pibex2"],input[id="residenciaPedagogica2"],input[id="estagioNaoObrigatorio2"],input[id="atividadeComunidade2"],input[id="participouDeEventos2"],input[id="empresaJunior2"],input[id="diretorioAcademico2"],input[id="outrasAtividades2"],input[id="tutoria2"]');

    
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
  let statusInputs = document.querySelectorAll('input[name = posGraduacaoUfpa]')
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
  let tipoDeEmpregoInputs = document.querySelectorAll('input[name=tipoDeEmprego]');
  let tipoDeEmpregoInputs2 = document.querySelectorAll('input[name=motivo]');
  let tipoDeEmpregoInputs3 = document.querySelectorAll('input[name=tempoFormaturaEmprego]');
  let tipoDeEmpregoInputs4 = document.querySelectorAll('input[name=faixaSalarial]');
  let tipoDeEmpregoInputs5 = document.querySelectorAll('input[name=estagioContribuiuEmprego]');
  let tipoDeEmpregoLabels = document.querySelectorAll('.dependente2 label, .dependente2 p');
  let tipoDeEmpregoLabels2 = document.querySelectorAll('.dependente3 label, .dependente3 p');
  let tipoDeEmpregoLabels3 = document.querySelectorAll('.dependente4 label, .dependente4 p');
  let tipoDeEmpregoLabels4 = document.querySelectorAll('.dependente5 label, .dependente5 p');
  let tipoDeEmpregoLabels5 = document.querySelectorAll('.dependente7 label, .dependente7 p');
  
  
  // Desabilita ou habilita inputs baseado na condição
  tipoDeEmpregoInputs.forEach(input => {
    if (empregado.startsWith('Não')) {
      input.disabled = true;
    } else {
      input.disabled = false;
    }  
  });
  
  tipoDeEmpregoInputs2.forEach(input => {
    if (empregado === 'Sim, na área de minha formação acadêmica') {
      input.disabled = true;
    } else {
      input.disabled = false;
    }  
  });
  
  tipoDeEmpregoInputs3.forEach(input => {
    if (empregado === 'Não, e nunca exerci') {
      input.disabled = true;
    } else {
      input.disabled = false;
    }  
  });
  
  tipoDeEmpregoInputs4.forEach(input => {
    if (empregado.startsWith('Não')) {
      input.disabled = true;
    } else {
      input.disabled = false;
    }  
  });
  
  tipoDeEmpregoInputs5.forEach(input => {
    if (empregado === 'Não, e nunca exerci') {
      input.disabled = true;
    } else {
      input.disabled = false;
    }  
  });
  
  // Adiciona ou remove a classe 'desabilitado2' de labels baseado na condição
  tipoDeEmpregoLabels.forEach(label => {
    if (empregado.startsWith('Não')) {
      label.classList.add('desabilitado2');
    } else {
      label.classList.remove('desabilitado2');
    }
  });
  
   tipoDeEmpregoLabels2.forEach(label => {
    if (empregado === 'Sim, na área de minha formação acadêmica')   {
      label.classList.add('desabilitado2');
      
    } else {
      label.classList.remove('desabilitado2');
    }
  });
  tipoDeEmpregoLabels3.forEach(label => {
    if (empregado === 'Não, e nunca exerci') {
      label.classList.add('desabilitado2');
    } else {
      label.classList.remove('desabilitado2');
    }
  });
  
  tipoDeEmpregoLabels4.forEach(label => {
    if (empregado.startsWith('Não')) {
      label.classList.add('desabilitado2');
    } else {
      label.classList.remove('desabilitado2');
    }
  });

  tipoDeEmpregoLabels5.forEach(label => {
    if (empregado === 'Não, e nunca exerci') {
      label.classList.add('desabilitado2');
    } else {
      label.classList.remove('desabilitado2');
    }
  });
  
  // Desabilita ou habilita a próxima pergunta específica
  let perguntaSeguinte = document.querySelector('.dependente2 .pergunta');
  if (perguntaSeguinte) {
    perguntaSeguinte.disabled = (empregado === 'Não, e nunca exerci');
  }
  
}
  





/*************************************NÍVEL DE SATISFAÇÃO COM A UFPA E COM O CURSO *************************************/
function melhorar() {

  let participa = document.querySelector('input[name="melhorarApectos11"][value="Outros"]');
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
