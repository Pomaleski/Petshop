<?php $ignoraSessao = true; ?>
<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1><?= $objUsuario->getCod() == null ? 'Cadastro' : 'Atualizar dados' ?> de Usuário</h1>
        <form id="formUsuarioCreate">
            <input type="hidden" name="action" id="action" value="<?= $objUsuario->getCod() == null ? 'create' : 'update' ?>">
            <input type="hidden" name="cod" id="cod" value="<?= $objUsuario->getCod()?>">
            <div class="form-floating mt-3" id="div-nome">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo*" value="<?= $dadosUsuario['nome'] ?>">
                <label for="nome" id="label-nome">Nome Completo*</label>
            </div>
            <div class="form-floating" id="div-data_nascimento">
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento*" value="<?= $dadosUsuario['data_nascimento'] ?>">
                <label for="data_nascimento" id="label-data_nascimento">Data de Nascimento*</label>
            </div>
            <div class="form-floating" id="div-cpf">
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF*" value="<?= $dadosUsuario['cpf'] ?>">
                <label for="cpf" id="label-cpf">CPF*</label>
            </div>
            <div class="form-floating" id="div-telefone">
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone*" value="<?= $dadosUsuario['telefone'] ?>">
                <label for="telefone" id="label-telefone">Telefone*</label>
            </div>
            <div class="form-floating" id="div-email">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email*"  value="<?= $dadosUsuario['email'] ?>">
                <label for="email" id="label-email">Email*</label>
            </div>
            <?php if ($objUsuario->getCod() == null) { ?>
                <div class="form-floating" id="div-confirmar_email">
                    <input type="email" class="form-control" name="confirmar_email" id="confirmar_email" placeholder="Confirmar Email*">
                    <label for="confirmar_email" id="label-confirmar_email">Confirmar Email*</label>
                </div>
                <div class="form-floating" id="div-senha">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha*">
                    <label for="senha" id="label-senha">Senha*</label>
                </div>
                <div class="form-floating" id="div-confirmar_senha">
                    <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar Senha*">
                    <label for="confirmar_senha" id="label-confirmar_senha">Confirmar Senha*</label>
                </div>
            <?php } ?>
            <?php if ($_SESSION['login']) { ?>
                <div class="form-floating" id="div-cep">
                    <input type="number" class="form-control" name="cep" id="cep" placeholder="CEP" value="<?= $dadosUsuario['cep'] ?>">
                    <label for="cep" id="label-cep">CEP</label>
                </div>
                <div class="form-floating" id="div-logradouro">
                    <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="<?= $dadosUsuario['logradouro'] ?>">
                    <label for="logradouro" id="label-logradouro">Logradouro</label>
                </div>
                <div class="form-floating" id="div-numero_residencia">
                    <input type="number" class="form-control" name="numero_residencia" id="numero_residencia" placeholder="Número da Residência" value="<?= $dadosUsuario['numero_residencia'] ?>">
                    <label for="numero_residencia" id="label-numero_residencia">Número da Residência</label>
                </div>
                <div class="form-floating" id="div-complemento">
                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="<?= $dadosUsuario['complemento'] ?>">
                    <label for="complemento" id="label-complemento">Complemento</label>
                </div>
                <div class="form-floating" id="div-bairro">
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="<?= $dadosUsuario['bairro'] ?>">
                    <label for="bairro" id="label-bairro">Bairro</label>
                </div>
                <div id="div-fk_cod_cidade">
                    <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_cidade" id="fk_cod_cidade">
                        <option value="">Cidade</option>
                        <?php 
                            $list = $objCidade->list();
                            foreach($list as $value) {
                        ?>
                            <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosUsuario['fk_cod_cidade']) echo 'selected' ?>><?= $value['uf'] . ', ' . $value['nome'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if ($objUsuario->getCod() !== null) { ?>
                    <div class="mt-3" id="div-foto">
                        <label for="foto" id="label-foto">Foto de Usuário</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto de Usuário" value="">
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="mt-2 text-start campos-obrigatorios">
                *Campos obrigatórios
            </div>
            <div class="d-flex justify-content-center">
                <?php if ($_SESSION['perfil'] == 'adm') { ?>
                    <button class="button btn btn-lg btn-warning mt-5 me-3" type="button" onclick="adm.carregar('usuario')">
                        Voltar
                    </button>
                <?php } ?>
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="usuario.create()">
                    <?= $objUsuario->getCod() == null ? 'Cadastrar' : 'Atualizar' ?>
                </button>
            </div>
        </form>
        <div class="mt-3 mb-5 link">
            <div>
                <a href="javascript:void(0)" onclick="main.carregar('login')">
                    Já tem uma conta?
                </a>
            </div>
        </div>
    </div>
</div>
<?php require_once('usuarioJs.php'); ?>