<div class="container my-5">
    <div class="d-flex flex-column justify-content-center">
        <h1>Lista de Pets</h1>
        <form action="">
            <button class="button btn btn-lg btn-warning mt-2" type="button" onclick="adm.novo('pet')">
                Novo Pet
            </button>
        </form>
        <div id="table" class="d-flex">
            <table class="table table-dark table-striped table-hover mt-5">
                <thead>
                    <tr>
                        <th class="col p-3">#</th>
                        <th class="col p-3">Nome</th>
                        <th class="col p-3">Espécie</th>
                        <th class="col p-3">Gênero</th>
                        <th class="col p-3">Raça</th>
                        <th class="col p-3">Alergias</th>
                        <th class="col p-3">Descrição</th>
                        <th class="col p-3">Foto</th>
                        <th class="col p-3">Dono / Codigo</th>
                        <th class="col p-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $list = $objPet->list();
                        foreach ($list as $value) {
                    ?>
                        <tr>
                            <th scope="row" class="col p-3"><?= $value['cod'] ?></th>
                            <td class="col p-3"><?= $value['nome'] ?></td>
                            <td class="col p-3"><?php
                                if ($value['fk_cod_especie'] != null) {
                                    $objEspecie->setCod($value['fk_cod_especie']);
                                    $especie = ($objEspecie->read())[0];
                                    echo $especie['nome'];
                                }
                            ?></td>
                            <td class="col p-3"><?= $value['genero'] == 'm' ? 'Macho' : 'Fêmea' ?></td>
                            <td class="col p-3"><?= $value['raca'] ?></td>
                            <td class="col p-3"><?= $value['alergia'] ?></td>
                            <td class="col p-3"><?= $value['descricao'] ?></td>
                            <td class="col p-3">
                            <?php
                                    if ($value['foto'] !== null) {
                                        ?>
                                            <a href="<?= __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $value['foto'] ?>" target="_blank"><?= $value['foto'] ?></a>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td class="col p-3"><?php
                                if ($value['fk_cod_usuario'] != null) {
                                    $objUsuario->setCod($value['fk_cod_usuario']);
                                    $usuario = ($objUsuario->read())[0];
                                    echo $usuario['nome'] . " / " . $usuario['cod'];
                                }
                            ?></td>
                            <td class="col p-3">
                                <a href="javascript:void(0)" onclick="pet.update(<?= $value['cod'] ?>)">Atualizar</a>
                                <a href="javascript:void(0)" onclick="pet.delete(<?= $value['cod'] ?>)">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once('petJs.php'); ?>