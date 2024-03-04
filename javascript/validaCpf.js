// <!--------------------- Início do código JavaScrip para tratamento de erro ---------------------------->
function validarCpf(event) {
    
    const cpfInput = document.querySelector('.cpf');
    const cpf = cpfInput.value;
    
    if(cpf.length !== 11 || isNaN(cpf) || /^0*$/.test(cpf)) {
        const erroCpf = document.querySelector('.erro');
        erroCpf.textContent = "Insira um CPF válido";
        cpfInput.style.borderColor = 'red';
        event.preventDefault();
    } else {
        cpfInput.style.borderColor = '';
    }
}
// <!--------------------- Fim do código JavaScrip para tratamento de erro ---------------------------->
