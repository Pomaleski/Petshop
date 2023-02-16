<?php
include_once('../../lib/config.php');

$objCidade = new cidadeModel($_REQUEST);

$action = $_REQUEST['action'];

switch ($action) {
    case 'create':

        break;
    case 'read':

        break;
    case 'update':

        break;
    case 'delete':

    case 'list':
        $listCidade = $objCidade->list();
        break;
}