<?php
include_once('../../lib/config.php');

$objProcedimento = new procedimentoModel($_REQUEST);

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':
        deleteAction();

        $arrErro = $objProcedimento->validate();

        if (isset($_FILES['foto'])) {
            $pathinfo = pathinfo($_FILES['foto']['name']);
            $extensao = $pathinfo['extension'];
            $erroUpload = uploadArquivo($_FILES['foto'], $objProcedimento->getNome() . "." . $extensao);
            if ($erroUpload !== null) $arrErro[] = $erroUpload;
            $objProcedimento->setFoto($objProcedimento->getNome() . "." . $extensao);
        }

        if (count($arrErro) == 0) {
            if ($objProcedimento->insert() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/procedimento/procedimentoRead.php');
            }
        }

        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/procedimento/procedimentoRead.php');

        break;
    case 'update':
        deleteAction();

        $arrErro = $objProcedimento->validate();

        if (isset($_FILES['foto'])) {
            $procedimentoNome = (($objProcedimento->read())[0])['nome'];
            $pathinfo = pathinfo($_FILES['foto']['name']);
            $extensao = $pathinfo['extension'];
            $erroUpload = uploadArquivo($_FILES['foto'], $procedimentoNome . "." . $extensao);
            if ($erroUpload !== null) $arrErro[] = $erroUpload;
            $objProcedimento->setFoto($objProcedimento->getNome() . "." . $extensao);
        }

        if (count($arrErro) == 0) {
            if ($objProcedimento->update() === true) {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/procedimento/procedimentoRead.php');
            }
        }

        break;
    case 'delete':
        deleteAction();

        $objProcedimento->delete();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/procedimento/procedimentoRead.php');

        break;
    case 'new':
        deleteAction();

        if ($objProcedimento->getCod() != null) {
            $dadosProcedimento = ($objProcedimento->read())[0];
        }

        require_once(__AGENDAMENTO_DIR__ . 'src/view/procedimento/procedimentoCreate.php');

        break;
}