<?php
include_once('../../lib/config.php');

$objEspecialidade = new especialidadeModel($_REQUEST);

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':
        deleteAction();

        $arrErro = $objEspecialidade->validate();

        if (count($arrErro) == 0) {
            if ($objEspecialidade->insert() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/especialidade/especialidadeRead.php');
            }
        }

        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/especialidade/especialidadeRead.php');

        break;
    case 'update':
        deleteAction();

        $arrErro = $objEspecialidade->validate();
        
        if (count($arrErro) == 0) {
            if ($objEspecialidade->update() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/especialidade/especialidadeRead.php');
            }
        } else {
            require_once(__AGENDAMENTO_DIR__ . 'src/view/especialidade/especialidadeRead.php');
        }

        break;
    case 'delete':
        deleteAction();

        $objEspecialidade->delete();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/especialidade/especialidadeRead.php');

        break;
    case 'new':
        deleteAction();

        if ($objEspecialidade->getCod() != null) {
            $dadosEspecialidade = ($objEspecialidade->read())[0];
        }

        require_once(__AGENDAMENTO_DIR__ . 'src/view/especialidade/especialidadeCreate.php');
        
        break;
}