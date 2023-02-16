<?php
$ignoraSessao = true;
include_once('../../lib/config.php');

$objUsuario = new usuarioModel($_REQUEST);

$objCidade =new cidadeModel(null);

$confirmaEmail = $_REQUEST['confirmar_email'];
$confirmaSenha = $_REQUEST['confirmar_senha'];

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':
        deleteAction();

        $arrErro = $objUsuario->validate();
        if ($objUsuario->getEmail() != $confirmaEmail) { $arrErro[] = 'confirmar_email'; }
        if ($objUsuario->getSenha() != $confirmaSenha) { $arrErro[] = 'confirmar_senha'; }

        if (count($arrErro) == 0) {
            if ($objUsuario->insert() === true) {
                if ($_SESSION['perfil'] == 'adm') {
                    require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioRead.php');
                } else {
                    require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuario.php');
                }
            }
        }
        
        break;
    case 'read':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioRead.php');

        break;
    case 'update':
        deleteAction();

        $objUsuario->setSenha('senha');

        $arrErro = $objUsuario->validate();

        if (isset($_FILES['foto'])) {
            $pathinfo = pathinfo($_FILES['foto']['name']);
            $extensao = $pathinfo['extension'];
            $erroUpload = uploadArquivo($_FILES['foto'], $objUsuario->getCod() . 'perfil' . "." . $extensao);
            if ($erroUpload !== null) $arrErro[] = $erroUpload;
            $objUsuario->setFoto($objUsuario->getCod() . 'perfil' . "." . $extensao);
        }

        if (count($arrErro) == 0) {
            if ($objUsuario->update() === true) {
                if ($_SESSION['perfil'] == 'adm') {
                    require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioRead.php');
                } else {
                    require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuario.php');
                }
            }
        } else {
            require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioRead.php');
        }
        
        break;
    case 'delete':
        deleteAction();

        $objUsuario->delete();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioRead.php');
        
        break;
    case 'new':
        deleteAction();
        
        if ($objUsuario->getCod() != null) {
            $dadosUsuario = ($objUsuario->read())[0];
        }

        require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioCreate.php');

        break;
    case 'config':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioConfig.php');

        break;
    case 'tela':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuario.php');

        break;
    case 'apagarFoto':
        deleteAction();

        $foto = ($objUsuario->read())[0];

        unlink(__AGENDAMENTO_DIR_UPLOAD__ . $foto['foto']);

        if ($objUsuario->apagarFoto()) {
            if ($_SESSION['perfil'] == 'adm') {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuarioRead.php');
            } else {
                require_once(__AGENDAMENTO_DIR__ . 'src/view/usuario/usuario.php');
            }
        }

        break;
}