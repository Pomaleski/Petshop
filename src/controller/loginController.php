<?php
$ignoraSessao = true;
include_once('../../lib/config.php');

$objLogin = new usuarioModel($_REQUEST);

$login = $_REQUEST['login'];
$password = $_REQUEST['password'];

$objLogin->setEmail($login);
$objLogin->setSenha($password);

$action = $_REQUEST['action'];

switch ($action) {
    case 'login':
        deleteAction();

        $arrMsgErro = [];

        if ($objLogin->getEmail() == '') {
            $arrMsgErro[] = 'Informe o email';
        }
        if ($objLogin->getSenha() == '') {
            $arrMsgErro[] = 'Informe a senha';
        }
        
        if (count($arrMsgErro) > 0) {
            header('Location: /?page=login');
        } else {
            if ($objLogin->validaLogin()) {
                $sessionData = $objLogin->searchEmail();

                $_SESSION['email'] = $sessionData['email'];
                $_SESSION['cod'] = $sessionData['cod'];
                $_SESSION['nome'] = $sessionData['nome'];

                switch ($sessionData['perfil']) {
                    case 'a':
                        $_SESSION['perfil'] = 'adm';
                        break;
                    case 'c':
                        $_SESSION['perfil'] = 'user';
                        break;
                    case 'f':
                        $_SESSION['perfil'] = 'func';
                        break;
                }

                if ($_SESSION['perfil'] == 'adm') {
                    header('Location: /?page=admin');
                } else {
                    header('Location: /');
                }
            }
        }
        break;
    case 'logout':
        deleteAction();

        sessaoLogout();

        break;
    case 'recuperar':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/login/loginRecuperar.php');

        break;
}
