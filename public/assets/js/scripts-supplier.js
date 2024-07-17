// function to display the placehoder according to the supplier
document.getElementById('type_supplier').addEventListener('change', function () {
    var type = this.value;
    var identifierInput = document.getElementById('cpf_cnpj');
    if (type === 'Fisica') {
        identifierInput.placeholder = 'Digite o CPF';
        identifierInput.value = '';
        applyCpfMask(identifierInput);
    } else if (type === 'Juridica') {
        identifierInput.placeholder = 'Digite o CNPJ';
        identifierInput.value = '';
        applyCnpjMask(identifierInput);
    } else {
        identifierInput.placeholder = 'Digite o CPF ou CNPJ';
        identifierInput.value = '';
        identifierInput.removeEventListener('input', handleCpfInput);
        identifierInput.removeEventListener('input', handleCnpjInput);
    }
});

// functions to display the mask according to the supplier
function applyCpfMask(input) {
    input.removeEventListener('input', handleCnpjInput);
    input.addEventListener('input', handleCpfInput);
}

function applyCnpjMask(input) {
    input.removeEventListener('input', handleCpfInput);
    input.addEventListener('input', handleCnpjInput);
}

function handleCpfInput(event) {
    var cpf = event.target.value.replace(/\D/g, "");

    if (cpf.length > 11) {
        cpf = cpf.slice(0, 11);
    }

    cpf = cpf.replace(/^(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/^(\d{3})\.(\d{3})(\d)/, "$1.$2.$3");
    cpf = cpf.replace(/\.(\d{3})(\d)/, ".$1-$2");

    event.target.value = cpf;
}

function handleCnpjInput(event) {
    var cnpj = event.target.value.replace(/\D/g, "");

    if (cnpj.length > 14) {
        cnpj = cnpj.slice(0, 14);
    }

    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2");
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2");
    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2");

    event.target.value = cnpj;
}

document.addEventListener("DOMContentLoaded", function () {
    var type = document.getElementById('type_supplier').value;
    var identifierInput = document.getElementById('cpf_cnpj');

    if (type === 'Fisica') {
        applyCpfMask(identifierInput);
    } else if (type === 'Juridica') {
        applyCnpjMask(identifierInput);
    }
});


//mascara para cep
document.addEventListener("DOMContentLoaded", function () {
    var cepInput = document.getElementById("cep");

    cepInput.addEventListener("input", function (event) {
        var cep = event.target.value.replace(/\D/g, "");

        if (cep.length > 8) {
            cep = cep.slice(0, 8);
        }

        cep = cep.replace(/^(\d{5})(\d)/, "$1-$2");

        event.target.value = cep;
    });
});


// este trecho de código verifica se o cpf ou cnpj é válido
document.getElementById('cpf_cnpj').addEventListener('blur', validateDocument);

function validateDocument() {
    const cpfCnpj = document.getElementById('cpf_cnpj').value;
    const errorMessage = document.getElementById('error-message');

    if (cpfCnpj === '') {
        errorMessage.style.display = 'none';
        return;
    }

    if (isValidCPF(cpfCnpj) || isValidCNPJ(cpfCnpj)) {
        errorMessage.style.display = 'none';
    } else {
        errorMessage.style.display = 'block';
        document.getElementById('cpf_cnpj').value = ''; // Limpa o campo
    }
}

function isValidCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf.length !== 11) return false;

    let sum = 0;
    let remainder;
    if (cpf == "00000000000") return false;

    for (let i = 1; i <= 9; i++) sum = sum + parseInt(cpf.substring(i - 1, i)) * (11 - i);
    remainder = (sum * 10) % 11;

    if ((remainder == 10) || (remainder == 11)) remainder = 0;
    if (remainder != parseInt(cpf.substring(9, 10))) return false;

    sum = 0;
    for (let i = 1; i <= 10; i++) sum = sum + parseInt(cpf.substring(i - 1, i)) * (12 - i);
    remainder = (sum * 10) % 11;

    if ((remainder == 10) || (remainder == 11)) remainder = 0;
    if (remainder != parseInt(cpf.substring(10, 11))) return false;
    return true;
}

function isValidCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g, '');
    if (cnpj.length !== 14) return false;

    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;

    let size = cnpj.length - 2;
    let numbers = cnpj.substring(0, size);
    let digits = cnpj.substring(size);
    let sum = 0;
    let pos = size - 7;

    for (let i = size; i >= 1; i--) {
        sum += numbers.charAt(size - i) * pos--;
        if (pos < 2) pos = 9;
    }
    let result = sum % 11 < 2 ? 0 : 11 - sum % 11;
    if (result != digits.charAt(0)) return false;

    size = size + 1;
    numbers = cnpj.substring(0, size);
    sum = 0;
    pos = size - 7;
    for (let i = size; i >= 1; i--) {
        sum += numbers.charAt(size - i) * pos--;
        if (pos < 2) pos = 9;
    }
    result = sum % 11 < 2 ? 0 : 11 - sum % 11;
    if (result != digits.charAt(1)) return false;
    return true;
}
