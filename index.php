<?php
    if (!isset($_GET['page']) or $_GET['page'] == 'login') $ignoraSessao = true;
    include_once('./lib/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __AGENDAMENTO_TITULO__ ?></title>
    <?php include_once(__AGENDAMENTO_DIR__ . 'src/view/painel/css.php') ?>
</head>

<body>
    <div id="nav-background"></div>
    <?php include_once(__AGENDAMENTO_DIR__ . 'src/view/painel/nav.php') ?>
    <div id="content">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        $page == '' ? include($arr_page['home']) : include($arr_page[$page]);
        ?>
    </div>
    <?php if($_GET['page'] != 'admin') include_once(__AGENDAMENTO_DIR__ . 'src/view/painel/footer.php') ?>
    <?php include_once(__AGENDAMENTO_DIR__ . 'src/view/painel/js.php') ?>
</body>

</html>