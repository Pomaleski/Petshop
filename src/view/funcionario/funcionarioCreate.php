<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1><?= $objFuncionario->getCod() == null ? 'Cadastro' : 'Atualizar dados' ?> de Funcionário</h1>
        <form id="formFuncionarioCreate">
            <input type="hidden" name="action" id="action" value="<?= $objFuncionario->getCod() == null ? 'create' : 'update' ?>">
            <input type="hidden" name="cod" id="cod" value="<?= $objFuncionario->getCod() ?>">
            <div class="form-floating mt-3" id="div-registro">
                <input type="text" class="form-control" name="registro" id="registro" placeholder="Registro" value="<?= $dadosFuncionario['registro'] ?>">
                <label for="registro" id="label-registro">Registro</label>
            </div>
            <div id="div-fk_cod_especialidade">
                <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_especialidade" id="fk_cod_especialidade">
                    <option value="">Especialidade</option>
                    <?php
                        $list = $objEspecialidade->list();
                        foreach ($list as $value) {
                    ?>
                        <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosFuncionario['fk_cod_especialidade']) echo 'selected' ?>><?= $value['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="div-fk_cod_usuario">
                <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_usuario" id="fk_cod_usuario">
                    <option value="">Código Usuário</option>
                    <?php
                        $list = $objUsuario->list();
                        foreach ($list as $value) {
                    ?>
                        <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosFuncionario['fk_cod_usuario']) echo 'selected' ?>><?= $value['cod'] . ', ' . $value['cpf'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-2 text-start campos-obrigatorios">
                *Campos obrigatórios
            </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5 me-3" type="button" onclick="adm.carregar('funcionario')">
                    Voltar
                </button>
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="funcionario.create()">
                    <?= $objFuncionario->getCod() == null ? 'Cadastrar' : 'Atualizar' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('funcionarioJs.php'); ?>