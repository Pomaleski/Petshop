<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1><?= $objProcedimento->getCod() == null ? 'Cadastro' : 'Atualização' ?> de Procedimento</h1>
        <form id="formProcedimentoCreate" enctype="multipart/form-data">
            <input type="hidden" name="action" id="action" value="<?= $objProcedimento->getCod() == null ? 'create' : 'update' ?>">
            <input type="hidden" name="cod" id="cod" value="<?= $objProcedimento->getCod() ?>">
            <div class="form-floating mt-3" id="div-nome">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Procedimento" value="<?= $dadosProcedimento['nome'] ?>">
                <label for="nome" id="label-nome">Procedimento</label>
            </div>
            <div class="mt-3" id="div-foto">
                    <label for="foto" id="label-foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="">
                </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5 me-3" type="button" onclick="adm.carregar('procedimento')">
                    Voltar
                </button>
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="procedimento.create()">
                    <?= $objProcedimento->getCod() == null ? 'Cadastrar' : 'Atualizar' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('procedimentoJs.php'); ?>