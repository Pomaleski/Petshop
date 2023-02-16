<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Fazer Agendamento</h1>
        <form id="formAgendamentoCreate">
            <input type="hidden" name="action" id="action" value="<?= $objAgendamento->getCod() == null ? 'create' : 'update' ?>">
            <input type="hidden" name="cod" id="cod" value="<?= $objAgendamento->getCod()?>">
            <div id="div-fk_cod_pet">
                <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_pet" id="fk_cod_pet">
                    <option value="">Pet</option>
                    <?php 
                        $list = $objPet->list();
                        foreach ($list as $value) {
                    ?>
                        <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosAgendamento['fk_cod_pet']) echo 'selected' ?>><?= $value['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="div-fk_cod_procedimento">
                <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_procedimento" id="fk_cod_procedimento">
                    <option value="">Procedimento</option>
                    <?php 
                        $list = $objProcedimento->list();
                        foreach ($list as $value) {
                    ?>
                        <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosAgendamento['fk_cod_procedimento']) echo 'selected' ?>><?= $value['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="div-fk_cod_funcionario">
                <select class="form-select mt-3 pt-2 pb-3" name="fk_cod_funcionario" id="fk_cod_funcionario">
                    <option value="">Veterinário</option>
                    <?php 
                        $list = $objFuncionario->list();
                        foreach ($list as $value) {
                            $objUsuario->setCod($value['fk_cod_usuario']);
                            $nomeFuncionario = (($objUsuario->read())[0])['nome'];
                            ?>
                            <option value="<?= $value['cod'] ?>" <?php if ($value['cod'] == $dadosAgendamento['fk_cod_funcionario']) echo 'selected' ?>><?= $nomeFuncionario ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-floating" id="div-data">
                <input type="date" class="form-control" name="data" id="data" value="<?= $dataCalendar ?>">
                <label for="data">Data</label>
            </div>
            <div id="div-hora">
                <select class="form-select mt-3 pt-2 pb-3" name="hora" id="hora">
                    <option value="">Hora</option>
                    <option value="08:00:00">08:00</option>
                    <option value="08:40:00">08:40</option>
                    <option value="09:40:00">09:40</option>
                    <option value="13:00:00">13:00</option>
                    <option value="13:40:00">13:40</option>
                    <option value="15:40:00">15:40</option>
                </select>
            </div>
            <div class="form-floating" id="div-descricao">
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
                <label for="descricao">Descrição</label>
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" name="busca_entrega" id="busca_entrega">
                <label class="form-check-label" for="busca_entrega">
                    Serviço de Busca e Entrega
                </label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="agendamento.create()">
                    Agendar
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('agendamentoJs.php'); ?>