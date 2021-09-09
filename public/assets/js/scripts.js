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

/* BUSCA CEP */

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('funcEnd').value = ("");
    document.getElementById('funcDISTRIC').value = ("");
    document.getElementById('funcCity').value = ("");
    document.getElementById('inputState').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('funcEnd').value = (conteudo.logradouro);
        document.getElementById('funcDISTRIC').value = (conteudo.bairro);
        document.getElementById('funcCity').value = (conteudo.localidade);
        document.getElementById('funcUf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('funcEnd').value = "...";
            document.getElementById('funcDISTRIC').value = "...";
            document.getElementById('funcCity').value = "...";
            document.getElementById('funcUf').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};