let funcPass = document.getElementById('funcPass');
let funcPass2 = document.getElementById('funcPass2');

function validarSenha() {
    if (funcPass.value != funcPass2.value) {
        funcPass2.setCustomValidity("Senhas diferentes!");
        funcPass2.reportValidity();
        return false;
    } else {
        funcPass2.setCustomValidity("");
        return true;
    }
}

funcPass2.addEventListener('input', validarSenha);