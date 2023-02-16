<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1><?= $objPet->getCod() == null ? 'Cadastro' : 'Atualizar dados' ?> de Pet</h1>
        <form action="" id="formPetCreate">
            <input type="hidden" name="action" id="action" value="<?= $objPet->getCod() == null ? 'create' : 'update' ?>">
            <input type="hidden" name="cod" id="cod" value="<?= $objPet->getCod()?>">
            <?php if ($_SESSION['perfil'] == 'adm') { ?>
                <div id="div-fk_cod_usuario">
                    <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_usuario" id="fk_cod_usuario">
                        <option value="">Código Usuário</option>
                            <?php
                                $list = $objUsuario->list();
                                foreach ($list as $value) {
                            ?>
                        <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosPet['fk_cod_usuario']) echo 'selected' ?>><?= $value['cod'] . ', ' . $value['cpf'] ?></option>
                            <?php } ?>
                    </select>
                </div>
            <?php } else { ?>
                <input type="hidden" name="fk_cod_usuario" id="fk_cod_usuario" value="<?= $_SESSION['cod'] ?>">
            <?php } ?>
            <div class="form-floating mb-3" id="div-nome">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Pet*" value="<?= $dadosPet['nome'] ?>">
                <label for="nome" id="label-nome">Nome do Pet*</label>
            </div>
            <div id="div-genero">
                <select class="form-select mb-3 pt-4" name="genero" id="genero">
                    <option value="">Gênero*</option>
                    <option value="m" <?php if ('m' == $dadosPet['genero']) echo 'selected' ?>>Macho</option>
                    <option value="f" <?php if ('f' == $dadosPet['genero']) echo 'selected' ?>>Fêmea</option>
                </select>
            </div>
            <div id="div-especie">
                <select class="form-select mb-3 pt-4" name="fk_cod_especie" id="fk_cod_especie">
                    <option value="">Espécie*</option>
                    <?php
                        $list = $objEspecie->list();
                        foreach($list as $value) {
                    ?>
                        <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosPet['fk_cod_especie']) echo 'selected' ?>><?= $value['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-floating mb-3" id="div-raca">
                <input type="text" class="form-control" name="raca" id="raca" placeholder="Raça" value="<?= $dadosPet['raca'] ?>">
                <label for="raca" id="label-raca">Raça</label>
            </div>
            <div class="form-floating mb-3" id="div-alergia">
                <input type="text" class="form-control" name="alergia" id="alergia" placeholder="Alergias" value="<?= $dadosPet['alergia'] ?>">
                <label for="alergia" id="label-alergia">Alergias</label>
            </div>
            <div class="form-floating mb-3" id="div-vacina">
                <input type="text" class="form-control" name="vacina" id="vacina" placeholder="Vacinas" value="<?= $dadosPet['vacina'] ?>">
                <label for="vacina" id="label-vacina">Vacinas</label>
            </div>
            <div class="form-floating mb-3" id="descricao">
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="<?= $dadosPet['descricao'] ?>">
                <label for="descricao" id="label-descricao">Descrição</label>
            </div>
            <?php if ($objPet->getCod() !== null) { ?>
                <div class="mt-3" id="div-foto">
                    <label for="foto" id="label-foto">Foto do Pet</label>
                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto do Pet" value="">
                </div>
            <?php } ?>
            <div class="mt-2 text-start campos-obrigatorios">
                *Campos obrigatórios
            </div>
            <div class="d-flex justify-content-center">
                <?php if ($_SESSION['perfil'] == 'adm') { ?>
                    <button class="button btn btn-lg btn-warning mt-5 me-3" type="button" onclick="adm.carregar('pet')">
                        Voltar
                    </button>
                <?php } ?>
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="pet.create()">
                    <?= $objPet->getCod() == null ? 'Cadastrar' : 'Atualizar' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('petJs.php'); ?>