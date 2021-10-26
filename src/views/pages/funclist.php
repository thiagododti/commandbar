<?php $render('header'); ?>
<div class="col-11">

    <br>
    <div class="row ">

        <div class="col-10">
            <h2>Funcionários</h2>
        </div>
        <div class="col">

            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Funcionário
            </button>

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
                    <td><?= $funcionario->getFuncId(); ?></td>
                    <td><?= $funcionario->getFuncName(); ?></td>
                    <td><?= $funcionario->getFuncCarg(); ?></td>
                    <td><?= $funcionario->getFuncCpf(); ?></td>
                    <td><?= $funcionario->getFuncEmail(); ?></td>
                    <td>...</td>
                </tr>
            <?php endforeach; ?>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Funcionario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <br>
                        <h2>Cadastro de Funcionário</h2>
                        <form class="row g-3" method="POST" action="<?= $base; ?>/funcionarios/cadastrar">
                            <div class="col-md-6">
                                <label for="funcName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="funcName" name="FUNC_NAME">
                            </div>
                            <div class="col-md-6">
                                <label for="funcSname" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="funcSname" name="FUNC_SNAME">
                            </div>
                            <div class="col-md-4">
                                <label for="funcCpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="funcCpf" name="FUNC_CPF">
                            </div>
                            <div class="col-md-4">
                                <label for="funcEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="funcEmail" placeholder="exemplo@exemplo.com" name="FUNC_EMAIL">
                            </div>
                            <div class="col-md-2">
                                <label for="funcSal" class="form-label">Salário</label>
                                <input type="text" class="form-control" id="funcSal" name="FUNC_SAL">
                            </div>
                            <div class="col-md-2">
                                <label for="funcCarg" class="form-label">Cargo</label>
                                <select type="text" class="form-select" id="funcCarg" name="FUNC_CARG">
                                    <option selected>Gerente</option>
                                    <option>Garçon</option>
                                    <option>Caixa</option>
                                    <option>Cozinheiro(a)</option>
                                    <option>Faxineiro(a)</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="funcAdmDate" class="form-label">Data de Admissão</label>
                                <input type="date" class="form-control" id="funcAdmDate" name="FUNC_ADMDATE">
                            </div>
                            <div class="col-md-4">
                                <label for="funcDmsDate" class="form-label">Data de Demissão</label>
                                <input type="date" class="form-control" id="funcDmsDate" name="FUNC_DMSDATE">
                            </div>
                            <div class="col-md-2">
                                <label for="funcPass" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="funcPass">
                            </div>
                            <div class="col-md-2">
                                <label for="funcPass2" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="funcPass2" name="FUNC_PASS">
                            </div>
                            <div class="col-md-8">
                                <label for="funcEnd" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="funcEnd" name="FUNC_END">
                            </div>
                            <div class="col-md-2">
                                <label for="funcEnd" class="form-label">Numero</label>
                                <input type="text" class="form-control" id="funcNum" name="FUNC_NUM">
                            </div>
                            <div class="col-md-2">
                                <label for="funcCep" class="form-label">Cep</label>
                                <div class="input-group mb-2">
                                    <button type="button" onClick="pesquisacep(funcCep.value)" class="btn btn-success">
                                        <img src="<?= $base ?>/assets/img/lupa.png" /></button>
                                    <input id="funcCep" type="text" class="form-control" name="FUNC_CEP" placeholder="CEP">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label for="funcDistric" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="funcDistric" name="FUNC_DISTRIC">
                            </div>
                            <div class="col-md-4">
                                <label for="funcCity" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="funcCity" name="FUNC_CITY">
                            </div>
                            <div class="col-md-1">
                                <label for="funcUf" class="form-label">UF</label>
                                <input type="text" id="funcUf" class="form-control" name="FUNC_UF">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" onclick="return validarSenha()">Cadastrar</button>
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