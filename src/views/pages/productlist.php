<?php $render('header'); ?>
<div class="col-11">

    <br>
    <div class="row ">

        <div class="col-6">
            <h2>Produtos</h2>
        </div>
        <div class="col-2">
            <a href="<?= $base ?>/lista/entradas"><button type="button" class="btn btn-dark">
                    Relatorio de Entradas
                </button></a>
        </div>
        <div class=" col-2">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalentrada">
                Entrada de Produto
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalprod">
                Cadastrar Produto
            </button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><a class="text-decoration-none text-dark" href="<?= $base; ?>/produtos/Descricao">Descrição</a></th>
                <th scope="col"><a class="text-decoration-none text-dark" href="<?= $base; ?>/produtos/Quantidade">Quantidade</a></th>
                <th scope="col"><a class="text-decoration-none text-dark" href="<?= $base; ?>/produtos/Valor">Valor</a></th>
                <th scope="col"><a class="text-decoration-none text-dark" href="<?= $base; ?>/produtos/Categoria">Categoria</a></th>
                <th scope="col"><a class="text-decoration-none text-dark" href="<?= $base; ?>/produtos/Status">Status</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?= $produto->getProdId(); ?></td>
                    <td><?= $produto->getProdDesc(); ?></td>
                    <td><?= $produto->getProdQtd(); ?></td>
                    <td><?= $produto->getProdValor(); ?></td>
                    <td><?= $produto->getProdCateg(); ?></td>
                    <td><?= $produto->getProdStat(); ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Cadastro de Produto -->
<div class="modal fade" id="modalprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Cadastro de Produto</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <br>

                        <form class="row g-3" method="POST" action="<?= $base; ?>/produtos/cadastrar">
                            <div class="col-md-8">
                                <label for="prodDesc" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="prodDesc" name="PROD_DESC">
                            </div>
                            <div class="col-md-4">
                                <label for="prodMarca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="prodMarca" name="PROD_MARCA">
                            </div>
                            <div class="col-md-5">
                                <label for="prodValor" class="form-label">Valor</label>
                                <input type="text" class="form-control" id="prodValor" name="PROD_VALOR">
                            </div>
                            <div class="col-md-3">
                                <label for="prodStat" class="form-label">Status</label>
                                <select type="text" class="form-select" id="prodStat" name="PROD_STAT">
                                    <option selected>Ativo</option>
                                    <option>Desativado</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="prodCateg" class="form-label">Categoria</label>
                                <select type="text" class="form-select" id="prodCateg" name="PROD_CATEG">
                                    <option selected>Bebida</option>
                                    <option>Pratos</option>
                                    <option>Talheres</option>
                                    <option>Copos</option>
                                    <option>Carnes</option>
                                    <option>Petiscos</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" name="novoproduto">Cadastrar</button>
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

<!-- Modal Entrada de Produto -->
<div class="modal fade" id="modalentrada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Entrada de produto</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <br>

                        <form class="row g-3" method="POST" action="<?= $base; ?>/produtos/entrada">
                            <div class="col-md-12">
                                <label for="prodId" class="form-label">Produto</label>
                                <select type="text" class="form-select" id="prodId" name="PROD_ID">
                                    <?php foreach ($produtos as $produto) : ?>
                                        <option value="<?= $produto->getProdId(); ?>"><?= $produto->getProdDesc(); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="forId" class="form-label">Fornecedor</label>
                                <select type="text" class="form-select" id="forId" name="FOR_ID">
                                    <?php foreach ($fornecedores as $fornecedor) : ?>
                                        <option value="<?= $fornecedor->getForId(); ?>"><?= $fornecedor->getForRazao(); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="qtForn" class="form-label">Quantidade</label>
                                <input type="text" class="form-control" id="qtForn" name="QT_FORNECIDA">
                            </div>
                            <div class="col-md-5">
                                <label for="dateEntrada" class="form-label">Data de entrada</label>
                                <input type="date" class="form-control" id="dateEntrada" name="DT_ENTRADA">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" name="novaentrada">Concluir</button>
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