<?php

use src\dao\FornecedorDao;
use src\dao\ProdutoDao;
use src\models\Produto;

$render('header'); ?>
<div class="col-11">
    <script type="text/javascript">
        window.<?= $alerta ?> = function() {
            alert("Não foi possivel cancelar a entrada, verifique a quantidade disponivel");
        }
    </script>

    <br>
    <div class="row ">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade Entrada</th>
                    <th scope="col">Data de Entrada</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($almoxarifados as $almoxarifado) : ?>
                    <tr>
                        <td><?= $almoxarifado->getEstId(); ?></td>
                        <td><?= $produto = $almoxarifado->getAlmProd();
                            $produtoDao = new ProdutoDao();
                            $pId = $produtoDao->buscarProdutoId($produto);
                            foreach ($pId as $p);
                            echo $p->getProdDesc(); ?></td>
                        <td><?= $almoxarifado->getQtFornecida(); ?></td>
                        <td><?= $almoxarifado->getDtEntrada(); ?></td>
                        <td><?= $fornecedor = $almoxarifado->getAlmForn();
                            $fornecedorDao = new FornecedorDao();
                            $fId = $fornecedorDao->buscarFornecedorId($fornecedor);
                            foreach ($fId as $f);
                            echo $f->getForRazao();
                            ?></td>
                        <td><a href="<?= $base; ?>/cancelar/entrada/<?= $almoxarifado->getEstId(); ?>">
                                <img src="<?= $base ?>/assets/img/botaox.png" /></a></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <?php $render('footer'); ?>