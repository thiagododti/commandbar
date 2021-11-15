<?php

use src\dao\FuncionarioDao;
use src\dao\ProdutoDao;

$render('header'); ?>



<div class="col-11">

    <div class="row">

        <div class="col-10">
            <br>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#comprarProduto">
                Inserir Produto
            </button>
        </div>
        <div class="col">
            <br>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#fecharComanda">
                Fechar Comanda
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
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($atendimentos as $atendimento) : ?>
                        <tr>
                            <td><?= $atendimento->getAteId(); ?></td>
                            <td><?= $prodId = $atendimento->getMesProd();
                                $produtoDao = new ProdutoDao();
                                $pId = $produtoDao->buscarProdutoId($prodId);
                                foreach ($pId as $p);
                                echo $p->getProdDesc();
                                ?></td>
                            <td><?= $atendimento->getQtProd(); ?></td>
                            <td><?= $atendimento->getVlProd(); ?></td>
                            <td><a href="<?= $base; ?>/retirar/produto/<?= $atendimento->getAteId(); ?>">Excluir?</a></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <?php foreach ($numMesa as $mesa) {
        } ?>
        <div class="col">
            <br>
            <h2>Status: <?php echo $mesa->getComStatus(); ?></h2>
            <h1>Numero da Mesa: <?php echo $mesa->getComMesa(); ?></h1>
            <h2>Comanda N°: <?php echo $mesa->getComId(); ?></h2>
            <br>
            <h2>Atendente: <?php $idFunc = $mesa->getComFunc();
                            $funcionarioDao = new FuncionarioDao();
                            $func = $funcionarioDao->buscarFuncionarioId($idFunc);
                            foreach ($func as $f);
                            echo $f->getFuncName();
                            ?></h2>
            <br>
            <br><br><br><br><br>
            <h2>Valor Produtos: <?php echo $mesa->getComTotal(); ?></h2>
            <h3>Valor 10%: R$ <?php echo $mesa->getComVlGarc(); ?></h3>
            <br><br><br><br>
            <h1>Valor Final: R$ <?php echo $mesa->getComTotal() + $mesa->getComVlGarc(); ?></h1>

        </div>
    </div>




</div>
<!-- MODAL PARA INSERIR PRODUTO NA COMANDA -->
<div class="modal fade" id="comprarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserir Produtos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="<?= $base; ?>/mesa/novo/produto">

                    <input type="hidden" value="<?= $mesa->getComId(); ?>" name="COM_ID">
                    <div class="col-md-12">
                        <label for="prodId" class="form-label">Produto</label>
                        <select type="text" class="form-select" id="prodId" name="PROD_ID">
                            <?php foreach ($produtos as $produto) : ?>
                                <option value="<?= $produto->getProdId(); ?>"><?= $produto->getProdDesc(); ?> - Qt Total = <?= $produto->getProdQtd(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="qtForn" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="qtForn" name="QT_PEDIDO">
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

<!-- MODAL PARA FECHAR A COMANDA -->
<div class="modal fade" id="fecharComanda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fechar Comanda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="<?= $base; ?>/mesa/fechar">
                    <div class="col-md-7">
                        <label for="qtForn" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="qtForn" name="COM_CPF">
                    </div>
                    <div class="col-md-5">
                        <label for="funcAdmDate" class="form-label">Data de Atendimento</label>
                        <input type="date" class="form-control" id="funcAdmDate" name="COM_DATE">
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="PAG_COMISS" value="sim" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Pagar comissão do garçon</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="PAG_COMISS" value="nao" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Não pagar comissão do garçon</label>
                    </div>
                    <input type="hidden" value="FECHADA" name="COM_STATUS">
                    <input type="hidden" value="<?= $mesa->getComId(); ?>" name="COM_ID">

                    <div class="col-md-12">
                        <label for="prodId" class="form-label">Forma de Pagamento</label>
                        <select type="text" class="form-select" id="prodId" name="COM_PAG">
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Cédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-dark" name="fecharcomanda">Fechar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<?php $render('footer'); ?>