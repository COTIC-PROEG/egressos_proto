function envioSucesso(event) {

    var selects = document.querySelectorAll('select');
    var radioDivs = document.querySelectorAll('.radio');
    var todosPreenchidos = true;

    radioDivs.forEach(function(divNode) {
        var respondido = false;
        var peloMenosUmInputNaoPreenchido = false;
    
        Array.from(divNode.querySelectorAll('input')).forEach(function(input) {

            if (input.checked || input.disabled) {
                respondido = true;
            }
            if (input.value.trim() === '') {
                peloMenosUmInputNaoPreenchido = true;
            }

        });
    
        if (!respondido || peloMenosUmInputNaoPreenchido) {
            divNode.previousElementSibling.classList.add('obrigatorio');
            todosPreenchidos = false;
        } else {
            divNode.previousElementSibling.classList.remove('obrigatorio');
        }
    });



    selects.forEach(function(select) {
        if (select.selectedIndex === 0) {
            select.classList.add('select_vazio');
            todosPreenchidos = false;
        } else {
            select.classList.remove('select_vazio');
        }
    });

    if (!todosPreenchidos) {
        event.preventDefault();
        alert('Por favor, responda todas as perguntas.');
    }
}