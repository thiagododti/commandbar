<?php $render('header'); ?>



<div class="col-11">

    <div class="row">

        <div class="col">
            <br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comprarProduto">
                Inserir Produto
            </button>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Qt</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="col">
            <br>
            <h1>Numero da Mesa: <?php echo $numMesa['id']; ?></h1>
            <h2>Comanda N°: </h2>
            <br>
            <br>
            <br>
            <h2>Valor Produtos: </h2>
            

        </div>
    </div>




</div>
<!-- MODAL PARA INSERIR PRODUTO NA COMANDA -->
<div class="modal fade" id="comprarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="<?= $base; ?>/produtos/entrada">
                    <div class="col-md-12">
                        <label for="prodId" class="form-label">Produto</label>
                        <select type="text" class="form-select" id="prodId" name="PROD_ID">
                            <?php foreach ($produtos as $produto) : ?>
                                <option value="<?= $produto->getProdId(); ?>"><?= $produto->getProdDesc(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="qtForn" class="form-label">Quantidade</label>
                        <input type="text" class="form-control" id="qtForn" name="QT_PEDIDO">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark" name="novacompra">Pedir</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<?php $render('footer'); ?>