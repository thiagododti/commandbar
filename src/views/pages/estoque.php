<?php

use src\dao\ProdutoDao;
use src\models\Produto;

$render('header'); ?>
<div class="col-11">

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
                        <td><?= $prod = $almoxarifado->getAlmProd();
                            $produtoDao = new ProdutoDao();
                            $produto = $produtoDao->buscarProdutoId($prod);
                            foreach ($produto as $p);
                            echo $p->getProdDesc();
                            ?></td>
                        <td><?= $almoxarifado->getQtFornecida(); ?></td>
                        <td><?= $almoxarifado->getDtEntrada(); ?></td>
                        <td><?= $almoxarifado->getAlmForn(); ?></td>
                        <td>...</td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <?php $render('footer'); ?>