<?php
include_once('../../lib/config.php');

$objPet = new petModel($_REQUEST);

$objUsuario = new usuarioModel(null);
$objEspecie = new especieModel(null);

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':
        deleteAction();

        $arrErro = $objPet->validate();

        if (count($arrErro) == 0) {
            if ($objPet->insert() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/pet/petRead.php');
            }
        }

        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/pet/petRead.php');

        break;
    case 'update':
        deleteAction();

        $arrErro = $objPet->validate();

        if (isset($_FILES['foto'])) {
            $codPet = $objPet->getCod();
            $pathinfo = pathinfo($_FILES['foto']['name']);
            $extensao = $pathinfo['extension'];
            $erroUpload = uploadArquivo($_FILES['foto'], 'pet' . $codPet[0] . "." . $extensao);
            if ($erroUpload !== null) $arrErro[] = $erroUpload;
            $objPet->setFoto('pet' . $codPet[0] . "." . $extensao);
        }

        if (count($arrErro) == 0) {
            if ($objPet->update() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/pet/petRead.php');
            }
        }

        break;
    case 'delete':
        deleteAction();

        $objPet->delete();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/pet/petRead.php');

        break;
    case 'new':
        deleteAction();

        if ($objPet->getCod() != null) {
            $dadosPet = ($objPet->read())[0];
        }

        require_once(__AGENDAMENTO_DIR__ . 'src/view/pet/petCreate.php');

        break;
}