<?php $render('header'); ?>
<div class="col-11">
    <br>
    <div class="row ">

        <div class="col-10">
            <h2>Funcionários</h2>
        </div>
        <div class="col">
            <a href="<?= $base; ?>/cadastrar/funcionario">
                <button type="button" class="btn btn-dark">Cadastrar Funcionário</button>
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">CPF</th>231205
                <th scope="col">Email</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<?php $render('footer'); ?>