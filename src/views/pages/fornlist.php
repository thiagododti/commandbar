<?php $render('header'); ?>
<div class="col-11">

    <br>
    <div class="row ">

        <div class="col-10">
            <h2>Fornecedores</h2>
        </div>
        <div class="col">

            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Fornecedor
            </button>

        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Razão</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cnpj</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fornecedores as $fornecedor) : ?>
                <tr>
                    <td><?= $fornecedor->getForId(); ?></td>
                    <td><?= $fornecedor->getForRazao(); ?></td>
                    <td><?= '(' . $fornecedor->getForDdd() . ')' . $fornecedor->getForTel(); ?></td>
                    <td><?= $fornecedor->getForCnpj(); ?></td>
                    <td>...</td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Cadastro de Fornecedores</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <br>
                        <form class="row g-3" method="POST" action="<?= $base; ?>/fornecedores/cadastrar">
                            <div class="col-md-12">
                                <label for="fornRazao" class="form-label">Razão Social</label>
                                <input type="text" class="form-control" id="fornRazao" name="FORN_RAZAO">
                            </div>
                            <div class="col-md-4">
                                <label for="fornCnpj" class="form-label">CNPJ</label>
                                <input type="text" class="form-control" id="fornCnpj" name="FORN_CNPJ">
                            </div>
                            <div class="col-md-4">
                                <label for="fornDdd" class="form-label">DDD</label>
                                <input type="text" class="form-control" id="fornDdd" name="FORN_DDD">
                            </div>
                            <div class="col-md-4">
                                <label for="fornTel" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="fornTel" name="FORN_TEL">
                            </div>
                            <div class="col-md-8">
                                <label for="fEnd" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="fEnd" name="FORN_END">
                            </div>
                            <div class="col-md-2">
                                <label for="fNum" class="form-label">Numero</label>
                                <input type="text" class="form-control" id="fNum" name="FORN_NUM">
                            </div>
                            <div class="col-md-2">
                                <label for="fornCep" class="form-label">Cep</label>
                                <div class="input-group mb-2">
                                    <button type="button" onClick="pesquisacep(fornCep.value)" class="btn btn-success">
                                        <img src="<?= $base ?>/assets/img/lupa.png" /></button>
                                    <input id="fornCep" type="text" class="form-control" name="FORN_CEP" placeholder="CEP">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label for="fDistric" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="fDistric" name="FORN_DISTRIC">
                            </div>
                            <div class="col-md-4">
                                <label for="fCity" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="fCity" name="FORN_CITY">
                            </div>
                            <div class="col-md-1">
                                <label for="fUf" class="form-label">UF</label>
                                <input type="text" id="fUf" class="form-control" name="FORN_UF">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" name="novofornecedor">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<?php $render('footer'); ?>