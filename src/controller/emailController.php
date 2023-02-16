<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;

include_once('../../lib/config.php');

$action = $_REQUEST['action'];

switch ($action) {
    case 'send':
        deleteAction();

        $arrErro = [];

        $para = $_POST['para'];
        $assunto = $_POST['assunto'];
        $conteudo = $_POST['conteudo'];

        if ($para == '') {
            $arrErro[] = 'para';
        }
        if ($assunto == '') {
            $arrErro[] = 'assunto';
        }
        if ($conteudo == '') {
            $arrErro[] = 'conteudo';
        }

        if (count($arrErro) < 1) {
            $email = new PHPMailer(true);

            try {
                //config
                //$email->SMTPDebug  = SMTP::DEBUG_SERVER;
                $email->isSMTP();
                $email->Host        = 'smtp.office365.com';
                $email->SMTPAuth    = true;
                $email->Username    = __EMAIL__;
                $email->Password    = '';
                $email->SMTPSecure  = PHPMailer::ENCRYPTION_SMTPS;
                $email->Port        = 587;
                $email->SMTPAutoTLS = false;
                $email->SMTPSecure  = 'tls';

                //envio
                $email->setFrom(__EMAIL__, __AGENDAMENTO_TITULO__);
                $email->addAddress($para, '');
                $email->isHTML(true);
                $email->Subject     = $assunto;
                $email->Body        = $conteudo;
                $email->AltBody     = strip_tags($conteudo);

                $email->send();

                $para = '';
                $assunto = '';
                $conteudo = '';

                require_once(__AGENDAMENTO_DIR__ . 'src/view/email/emailCreate.php');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
            }
        }

        break;
    case 'new':
        deleteAction();

        require_once(__AGENDAMENTO_DIR__ . 'src/view/email/emailCreate.php');

        break;
}
