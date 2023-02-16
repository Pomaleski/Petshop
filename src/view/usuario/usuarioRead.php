<div class="container my-5">
    <div class="d-flex flex-column justify-content-center">
        <h1>Lista de Usuários</h1>
        <form action="">
            <button class="button btn btn-lg btn-warning mt-2" type="button" onclick="adm.novo('usuario')">
                Novo Usuário
            </button>
        </form>
        <div id="table" class="d-flex">
            <table class="table table-dark table-striped table-hover mt-5">
                <thead>
                    <tr>
                        <th class="col p-3">#</th>
                        <th class="col p-3">Nome</th>
                        <th class="col p-3">Email</th>
                        <th class="col p-3">Data de Nascimento</th>
                        <th class="col p-3">CPF</th>
                        <th class="col p-3">Telefone</th>
                        <th class="col p-3">CEP</th>
                        <th class="col p-3">Logradouro</th>
                        <th class="col p-3">Número Residência</th>
                        <th class="col p-3">Complemento</th>
                        <th class="col p-3">Bairro</th>
                        <th class="col p-3">Cidade</th>
                        <th class="col p-3">Perfil</th>
                        <th class="col p-3">Foto</th>
                        <th class="col p-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $list = $objUsuario->list();
                        foreach ($list as $value) {
                    ?>
                    <tr>
                        <th scope="row" class="col p-3"><?= $value['cod'] ?></th>
                        <td class="col p-3"><?= $value['nome'] ?></td>
                        <td class="col p-3"><?= $value['email'] ?></td>
                        <td class="col p-3">
                            <?php
                                $formatoData = date_create($value['data_nascimento']);
                                echo date_format($formatoData, "d/m/Y");
                            ?>
                        </td>
                        <td class="col p-3"><?= formatCPF($value['cpf']) ?></td>
                        <td class="col p-3"><?= $value['telefone'] ?></td>
                        <td class="col p-3"><?= $value['cep'] ?></td>
                        <td class="col p-3"><?= $value['logradouro'] ?></td>
                        <td class="col p-3"><?= $value['numero_residencia'] ?></td>
                        <td class="col p-3"><?= $value['complemento'] ?></td>
                        <td class="col p-3"><?= $value['bairro'] ?></td>
                        <td class="col p-3">
                            <?php
                                if ($value['fk_cod_cidade'] != null) {
                                    $objCidade->setCod($value['fk_cod_cidade']);
                                    $selectCidade = ($objCidade->read())[0];
                                    echo $selectCidade['nome'];
                                }
                            ?>
                        </td>
                        <td class="col p-3">
                            <?php 
                                switch ($value['perfil']) {
                                    case 'a':
                                        echo 'Administrador';
                                        break;
                                    case 'c':
                                        echo 'Cliente';
                                        break;
                                    case 'f':
                                        echo 'Funcionário';
                                        break;
                                }
                            ?>
                        </td>
                        <td class="col p-3">
                            <?php
                                if ($value['foto'] !== null) {
                                    ?>
                                        <a class="linkDelete" href="javascript:void(0)" onclick="usuario.abrirApagarFoto(<?= $value['cod'] ?>, '<?= $value['nome'] ?>')">X</a>
                                        <a href="<?= __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $value['foto'] ?>" target="_blank"><?= $value['foto'] ?></a>
                                    <?php
                                }
                            ?>
                        </td>
                        <td class="col p-3">
                            <a href="javascript:void(0)" onclick="usuario.update(<?= $value['cod'] ?>)">Atualizar</a>
                            <?php if ($value['perfil'] !== 'a') { ?>
                                <a class="linkDelete" href="javascript:void(0)" onclick="usuario.delete(<?= $value['cod'] ?>)">Deletar</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once('usuarioJs.php'); ?>