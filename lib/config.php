<?php
/**
 * Página de configuração
 */
error_reporting(E_ALL & ~E_WARNING);

/**
 * Constantes
 */
define('__AGENDAMENTO_DIR__', $_SERVER['DOCUMENT_ROOT'] . '/');
define('__AGENDAMENTO_HTTP__', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('__AGENDAMENTO_DIR_UPLOAD__', $_SERVER['DOCUMENT_ROOT'] . '/assets/upload/');
define('__AGENDAMENTO_DIR_UPLOAD_HTTP__', 'http://' . $_SERVER['HTTP_HOST'] . '/assets/upload/');

define('__AGENDAMENTO_TITULO__', 'Petshop GL');

define('__EMAIL__', '');

// require composer
require(__AGENDAMENTO_DIR__ . 'vendor/autoload.php');

// criando sessão
session_start();

// carregando functions
include_once(__AGENDAMENTO_DIR__ . 'lib/function.php');
if ($ignoraSessao == false) checarSessao();

// carregando database
include_once(__AGENDAMENTO_DIR__ . 'lib/database.php');

// array para roteamento
$arr_page = [
    'home' => __AGENDAMENTO_DIR__ . 'src/view/painel/content.php',
    'login' => __AGENDAMENTO_DIR__ . 'src/view/login/login.php',
    'agendamento' => __AGENDAMENTO_DIR__ . 'src/view/agendamento/agendamento.php',
    'perfil' => __AGENDAMENTO_DIR__ . 'src/view/usuario/usuario.php',
    'admin' => __AGENDAMENTO_DIR__ . 'src/view/administrador/administrador.php'
];

// include das classes model
include_once(__AGENDAMENTO_DIR__ . 'src/model/cidade.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/agendamento.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/especialidade.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/especie.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/funcionario.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/pet.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/procedimento.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/usuario.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/vacina_pet.class.php');
include_once(__AGENDAMENTO_DIR__ . 'src/model/vacina.class.php');