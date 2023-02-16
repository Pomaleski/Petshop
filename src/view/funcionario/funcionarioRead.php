<div class="container my-5">
    <div class="d-flex flex-column justify-content-center">
        <h1>Lista de Funcionário</h1>
        <form action="">
            <button class="button btn btn-lg btn-warning mt-2" type="button" onclick="adm.novo('funcionario')">
                Novo Funcionário
            </button>
        </form>
        <div id="table" class="d-flex">
            <table class="table table-dark table-striped table-hover mt-5">
                <thead>
                    <tr>
                        <th class="col p-3">#</th>
                        <th class="col p-3">Registro</th>
                        <th class="col p-3">Especialidade</th>
                        <th class="col p-3">Código Usuário</th>
                        <th class="col p-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $list = $objFuncionario->list();
                        foreach ($list as $value) {
                    ?>
                        <tr>
                            <th scope="row" class="col p-3"><?= $value['cod'] ?></th>
                            <td class="col p-3"><?= $value['registro'] ?></td>
                            <td class="col p-3">
                                <?php 
                                    if ($value['fk_cod_especialidade'] !== null) {
                                        $objEspecialidade->setCod($value['fk_cod_especialidade']);
                                        $especialidade = ($objEspecialidade->read())[0];
                                        echo $especialidade['nome'];
                                    }
                                ?>
                            </td>
                            <td class="col p-3">
                                <?php
                                    if ($value['fk_cod_usuario'] != null) {
                                        $objUsuario->setCod($value['fk_cod_usuario']);
                                        $usuario = ($objUsuario->read())[0];
                                        echo $usuario['cod'] . ", " . $usuario['nome'];
                                    }
                                ?>
                            </td>
                            <td class="col p-3">
                                <a href="javascript:void(0)" onclick="funcionario.update(<?= $value['cod'] ?>)">Atualizar</a>
                                <a href="javascript:void(0)" onclick="funcionario.delete(<?= $value['cod'] ?>)">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once('funcionarioJs.php'); ?>