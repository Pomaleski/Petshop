<?php
/**
 * Página de funções
 */

/**
 * Função para checar se $_SESSION['email'] existe, se não existir chama sessaoLogout()
 * @return void
 */
function checarSessao() {
    if (!isset($_SESSION['email'])) {
        sessaoLogout();
    }
}

/**
 * Função para fazer o logout, destruindo a $_SESSION e redirecionando para /?page=login
 * @return void
 */
function sessaoLogout() {
    session_destroy();
    header('Location: /?page=login');
}

/**
 * Função para validar CPF
 * @param string $cpf CPF que vai ser validado
 * 
 * @return boolean true para CPF válido, false para CPF inválido
 */
function validaCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

/**
 * Função para formatar o CPF para 000.000.000-00
 * @param string $cpf CPF
 * 
 * @return string CPF formatado
 */
function formatCPF($cpf) {
    $cpf1 = substr($cpf, 0, -8);
    $cpf2 = substr($cpf, 3, -5);
    $cpf3 = substr($cpf, 6, -2);
    $cpf4 = substr($cpf, 9);

    return $cpf1 . '.' . $cpf2 . '.' . $cpf3 . '-' . $cpf4;
}

/**
 * Função para fazer upload de arquivos
 * @param $_FILES $arquivo Arquivo que será gravado no diretório /assets/upload
 * @param string $nomeArquivo Nome do arquivo que vai ser gravado
 * 
 * @return string Mensagem de erro
 */
function uploadArquivo($arquivo, $nomeArquivo) {
    switch ($arquivo['error']) {
        case UPLOAD_ERR_INI_SIZE:
            return "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            return "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case UPLOAD_ERR_PARTIAL:
            return "The uploaded file was only partially uploaded";
            break;
        case UPLOAD_ERR_NO_FILE:
            return "Nenhum arquivo enviado";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            return "Missing a temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            return "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            return "File upload stopped by extension";
            break;
        default:
            $arquivo_tmp = $arquivo['tmp_name'];
            if (!move_uploaded_file($arquivo_tmp, __AGENDAMENTO_DIR_UPLOAD__ . $nomeArquivo)) {
                return 'Erro ao salvar arquivo';
            }
            break;
    }
}

function deleteAction() {
    unset($_REQUEST['action']);
    unset($_POST['action']);
    unset($_GET['action']);
}