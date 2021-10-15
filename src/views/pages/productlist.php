<?php $render('header'); ?>
<div class="col-11">

    <br>
    <div class="row ">

        <div class="col-10">
            <h2>Produtos</h2>
        </div>
        <div class="col">
            <a href="<?= $base; ?>/produtos/cadastrar">
                <button type="button" class="btn btn-dark">Cadastrar Produto</button>
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<?php $render('footer'); ?>