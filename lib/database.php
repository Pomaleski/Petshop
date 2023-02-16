<?php
/**
 * Página de configuração do banco de dados
 */

/**
 * Conexão por PDO
 */
define('__DB_HOST__', '');
define('__DB_USER__', '');
define('__DB_PASSWORD__', '');
define('__DB_PORT__', '3306');
define('__DB_DEFAULT_DATABASE__', '');

$pdo = new PDO('mysql:dbname='.__DB_DEFAULT_DATABASE__.';host='.__DB_HOST__.";charset=utf8", __DB_USER__, __DB_PASSWORD__);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);