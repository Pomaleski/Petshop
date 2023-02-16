<?php
include_once('../../lib/config.php');

$objFuncionario = new funcionarioModel($_REQUEST);

$objUsuario = new usuarioModel(null);
$objEspecialidade = new especialidadeModel(null);

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':
        deleteAction();

        $arrErro = $objFuncionario->validate();
        
        if (count($arrErro) == 0) {
            if ($objFuncionario->insert() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/controller/usuarioController.php');
                require_once(__AGENDAMENTO_DIR__ . 'src/controller/especialidadeController.php');
                require_once(__AGENDAMENTO_DIR__ . 'src/view/funcionario/funcionarioRead.php');
            }
        }
        
        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/controller/usuarioController.php');
        require_once(__AGENDAMENTO_DIR__ . 'src/controller/especialidadeController.php');
        require_once(__AGENDAMENTO_DIR__ . 'src/view/funcionario/funcionarioRead.php');
        
        break;
    case 'update':
        deleteAction();

        $arrErro = $objFuncionario->validate();
        
        if (count($arrErro) == 0) {
            if ($objFuncionario->update() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/controller/usuarioController.php');
                require_once(__AGENDAMENTO_DIR__ . 'src/controller/especialidadeController.php');
                require_once(__AGENDAMENTO_DIR__ . 'src/view/funcionario/funcionarioRead.php');
            }
        } else {
            require_once(__AGENDAMENTO_DIR__ . 'src/controller/usuarioController.php');
            require_once(__AGENDAMENTO_DIR__ . 'src/controller/especialidadeController.php');
            require_once(__AGENDAMENTO_DIR__ . 'src/view/funcionario/funcionarioRead.php');
        }

        break;
    case 'delete':
        deleteAction();

        $objFuncionario->delete();

        require_once(__AGENDAMENTO_DIR__ . 'src/controller/usuarioController.php');
        require_once(__AGENDAMENTO_DIR__ . 'src/controller/especialidadeController.php');
        require_once(__AGENDAMENTO_DIR__ . 'src/view/funcionario/funcionarioRead.php');

        break;
    case 'new':
        deleteAction();

        if ($objFuncionario->getCod() != null) {
            $dadosFuncionario = ($objFuncionario->read())[0];
        }

        require_once(__AGENDAMENTO_DIR__ . 'src/controller/usuarioController.php');
        require_once(__AGENDAMENTO_DIR__ . 'src/controller/especialidadeController.php');
        require_once(__AGENDAMENTO_DIR__ . 'src/view/funcionario/funcionarioCreate.php');

        break;
}