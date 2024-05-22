$(document).ready(function(){
    $('#my-form').validate({
        rules: {
            nome: {
                required: true,
                minlength:3
            },

            email: {
                required: true,
                email: true
            },

            senha1: {
                required: true
            },

            senha2: {
                required: true
            }
        },
        
        messages: {
            nome: {
                required: "Por favor, insira o seu nome",
                minlength: "O seu nome deve ter mais de 3 caracteres"
            },

            email: {
                required: "Por favor, insira o seu email",
                email: "Insira um email válido"
            },

            senha1: {
                required: "Por favor, digite uma senha",
            },

            senha2: {
                required: "Digite a sua senha novamente"
            }
        }
    })
})

function validarSenha() {
    let senha = document.getElementById('senha1').value;
    let status = document.getElementById('statusSenha1');

    let numeros = /([0-9])/;
    let letraMin = /([a-z])/;
    let letraMai = /([A-Z])/;
    let chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

    if (numeros.test(senha) && (letraMin.test(senha)) && (letraMai.test(senha)) && (chEspeciais.test(senha))
        && senha.length > 6
    ) {
        status.textContent='Senha forte';
        status.style.color='green';
        return true;
    } else if (numeros.test(senha) && (letraMin.test(senha)) && (letraMai.test(senha))) {
        status.textContent='Senha média';
        status.style.color='orange';
        return true;
    } else {
        status.textContent='Senha fraca';
        status.style.color='red';
    }
}

function validarSenhaDiferente() {
    let senha1 = document.getElementById('senha1').value;
    let senha2 = document.getElementById('senha2').value;
    let status = document.getElementById('statusSenha2');

    if (senha2 != senha1) {
        status.textContent='Senhas diferentes';
        return false;
    } else {
        status.textContent="";
        return true;
    }
}

function validarForm() {
    if (validarSenha() && validarSenhaDiferente()) {
        return true;
    } else {
        return false;
    }
}