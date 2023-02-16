<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1><?= $objEspecie->getCod() == null ? 'Cadastro' : 'Atualização' ?> de Espécie</h1>
        <form id="formEspecieCreate">
            <input type="hidden" name="action" id="action" value="<?= $objEspecie->getCod() == null ? 'create' : 'update' ?>">
            <input type="hidden" name="cod" id="cod" value="<?= $objEspecie->getCod() ?>">
            <div class="form-floating mt-3" id="div-nome">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Espécie" value="<?= $dadosEspecie['nome'] ?>">
                <label for="nome" id="label-nome">Espécie</label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5 me-3" type="button" onclick="adm.carregar('especie')">
                    Voltar
                </button>
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="especie.create()">
                    <?= $objEspecie->getCod() == null ? 'Cadastrar' : 'Atualizar' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('especieJs.php'); ?>