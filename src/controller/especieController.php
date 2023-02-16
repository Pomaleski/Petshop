<?php
include_once('../../lib/config.php');

$objEspecie = new especieModel($_REQUEST);

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':
        deleteAction();

        $arrErro = $objEspecie->validate();

        if (count($arrErro) == 0) {
            if ($objEspecie->insert() == true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/especie/especieRead.php');
            }
        }

        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/especie/especieRead.php');

        break;
    case 'update':
        deleteAction();

        $arrErro = $objEspecie->validate();

        if (count($arrErro) == 0) {
            if ($objEspecie->update() == true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/especie/especieRead.php');
            }
        }

        break;
    case 'delete':
        deleteAction();

        $objEspecie->delete();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/especie/especieRead.php');

        break;
    case 'new':
        deleteAction();

        if ($objEspecie->getCod() != null) {
            $dadosEspecie = ($objEspecie->read())[0];
        }

        require_once(__AGENDAMENTO_DIR__ . 'src/view/especie/especieCreate.php');

        break;
}
