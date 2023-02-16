<?php
include_once('../../lib/config.php');

$objAgendamento = new agendamentoModel($_REQUEST);

$objPet = new petModel(null);
$objProcedimento = new procedimentoModel(null);
$objFuncionario = new funcionarioModel(null);
$objUsuario = new usuarioModel(null);

$action = $_REQUEST['action'];

switch ($action) {
    case 'calendar':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/agendamento/agendamentoCalendar.php');

        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/agendamento/agendamentoCreate.php');

        break;
    case 'create':
        deleteAction();

        $datetime = $_REQUEST['data'] . ' ' . $_REQUEST['hora'];
        $objAgendamento->setData_hora($datetime);

        $arrErro = $objAgendamento->validate();

        if (count($arrErro) == 0) {
            if ($objAgendamento->insert() === true) {
                if ($_SESSION['perfil'] == 'adm') {
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0;URL=/'>";
                }
            }
        }

        break;
    case 'new':
        deleteAction();

        $dataCalendar = $_REQUEST['dataCalendar'];

        require_once(__AGENDAMENTO_DIR__ . 'src/view/agendamento/agendamentoCreate.php');

        break;
}
