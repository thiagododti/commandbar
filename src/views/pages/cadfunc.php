<?php $render('header'); ?>

<div class="container">
    <img id="imgiconlogin1" class="rounded mx-auto d-block" src="<?= $base; ?>/assets/img/commandbar.png" /><br><br>
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
        <div class="col-md-6">
            <label for="funcEnd" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="funcEnd" name="FUNC_END">
        </div>
        <div class="col-md-2">
            <label for="funcEnd" class="form-label">Numero</label>
            <input type="text" class="form-control" id="funcEnd" name="FUNC_NUM">
        </div>
        <div class="col-md-2">
            <label for="funcCep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="funcCep" name="FUNC_CEP">
        </div>
        <div class="col-md-2">
            <label for="funcCep" class="form-label">CEP</label>
            <button type="button" class="btn btn-dark">Pesquisar CEP</button>
        </div>

        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">UF</label>
            <select id="inputState" class="form-select">
                <option selected>AM</option>
                <option>...</option>
            </select>
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