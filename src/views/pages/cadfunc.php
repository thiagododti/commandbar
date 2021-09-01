<?php $render('header'); ?>

<div class="col-8">
    <br>
    <h2>Cadastro de Funcionário</h2>
    <form class="row g-3">
        <div class="col-md-6">
            <label for="funcName" class="form-label">Nome</label>
            <input type="text" class="form-control" id="funcName" name="FUNC_NAME">
        </div>
        <div class="col-md-6">
            <label for="funcSname" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="funcSname" name="FUNC_SNAME">
        </div>
        <div class="col-md-6">
            <label for="funcCpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="funcCpf" name="FUNC_CPF">
        </div>
        <div class="col-md-6">
            <label for="funcEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="funcEmail" placeholder="exemplo@exemplo.com" name="FUNC_EMAIL">
        </div>
        <div class="col-md-8">
            <label for="funcEnd" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="funcEnd" name="FUNC_END">
        </div>
        <div class="col-md-2">
            <label for="funcEnd" class="form-label">Numero</label>
            <input type="text" class="form-control" id="funcEnd" name="FUNC_NUM">
        </div>
        <div class="col-md-2">
            <label for="funcCep" class="form-label">Cep</label>
            <div id="funcCep" class="input-group mb-2">
                <button type="button" class="btn btn-success"><img src="<?= $base ?>/assets/img/lupa.png" /></button>
                <input type="text" class="form-control" placeholder="CEP">
            </div>
        </div>
        <div class="col-md-7">
            <label for="funcDISTRIC" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="funcDISTRIC" name="FUNC_DISTRIC">
        </div>
        <div class="col-md-4">
            <label for="funcCity" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="funcCity" name="FUNC_CITY">
        </div>
        <div class="col-md-1">
            <label for="inputState" class="form-label">UF</label>
            <input id="inputState" class="form-control" name="FUNC_UF">
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>





<?php $render('footer'); ?>