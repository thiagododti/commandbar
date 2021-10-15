<?php $render('headerindex'); ?>

<div class="container">
    <br><br><br><br><br>
    <img id="imgiconlogin1" class="rounded mx-auto d-block" src="<?= $base; ?>/assets/img/commandbar.png" /><br><br>
    <div class="row align-items-center">
        <div class="col"></div>
        <div class="col">


            <form method="POST" action="<?= $base; ?>/login">
                <div class="mb-3">
                    <label for="InputCpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="InputCpf" name="FUNC_CPF">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="FUNC_PASS">
                </div>
                <button type="submit" class="btn btn-dark">Entrar</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>


<?php $render('footerindex'); ?>