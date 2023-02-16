<div class="container my-5">
    <div class="d-flex flex-column justify-content-center">
        <h1>Lista de Procedimentos</h1>
        <form action="">
            <button class="button btn btn-lg btn-warning mt-2" type="button" onclick="adm.novo('procedimento')">
                Novo Procedimento
            </button>
        </form>
        <div id="table" class="d-flex">
            <table class="table table-dark table-striped table-hover mt-5">
                <thead>
                    <tr>
                        <th class="col p-3">#</th>
                        <th class="col p-3">Nome</th>
                        <th class="col p-3">Foto</th>
                        <th class="col p-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $list = $objProcedimento->list();
                        foreach ($list as $value) {
                    ?>
                        <tr>
                            <th scope="row" class="col p-3"><?= $value['cod'] ?></th>
                            <td class="col p-3"><?= $value['nome'] ?></td>
                            <td class="col p-3">
                                <?php
                                    if ($value['foto'] !== null) {
                                        ?>
                                            <a href="<?= __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $value['foto'] ?>" target="_blank"><?= $value['foto'] ?></a>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td class="col p-3">
                                <a href="javascript:void(0)" onclick="procedimento.update(<?= $value['cod'] ?>)">Atualizar</a>
                                <a href="javascript:void(0)" onclick="procedimento.delete(<?= $value['cod'] ?>)">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once('procedimentoJs.php'); ?>