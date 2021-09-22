<?php $render('header'); ?>
<div class="col-11">
    <br>
    <div class="row ">

        <div class="col-10">
            <h2>Funcionários</h2>
        </div>
        <div class="col">
            <a href="<?= $base; ?>/funcionarios/cadastrar">
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
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col">#</th>
            </tr>
            <?php foreach ($funcionarios as $funcionario) : ?>
                <tr>
                    <td><?= $funcionario['FUNC_ID']; ?></td>
                    <td><?= $funcionario['FUNC_NAME']; ?></td>
                    <td><?= $funcionario['FUNC_CARG']; ?></td>
                    <td><?= $funcionario['FUNC_CPF']; ?></td>
                    <td><?= $funcionario['FUNC_EMAIL']; ?></td>
                    <td>...</td>
                </tr>
            <?php endforeach; ?>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<?php $render('footer'); ?>