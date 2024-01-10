<?php
/**
 * Página de configuração do banco de dados
 */

/**
 * Conexão por PDO
 */
define('__DB_HOST__', $_ENV['MYSQL_HOST']);
define('__DB_USER__', $_ENV['MYSQL_USER']);
define('__DB_PASSWORD__', $_ENV['MYSQL_PASSWORD']);
define('__DB_PORT__', $_ENV['MYSQL_PORT']);
define('__DB_DEFAULT_DATABASE__', $_ENV['MYSQL_DATABASE']);

$pdo = new PDO('mysql:dbname='.__DB_DEFAULT_DATABASE__.';host='.__DB_HOST__.';charset=utf8', __DB_USER__, __DB_PASSWORD__);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);