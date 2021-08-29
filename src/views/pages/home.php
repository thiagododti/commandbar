<?php $render('header'); ?>

<div class="container">
    <br><br><br><br><br>
    <img id="imgiconlogin1" class="rounded mx-auto d-block" src="<?= $base; ?>/assets/img/commandbar.png" /><br><br>
    <div class="row align-items-center">
        <div class="col"></div>
        <div class="col">
            <form action="">
                <div class="mb-3">
                    <label for="InputCpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="InputCpf">
                    <div id="emailHelp" class="form-text">Não compartilhe sua senha com outras pessoas!</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>


<?php $render('footer'); ?>