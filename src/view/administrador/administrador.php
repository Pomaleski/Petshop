<?php if ($_SESSION['perfil'] !== 'adm') header('Location: /') ?>

<div class="d-flex">
    <?php include_once('administradorNav.php') ?>
    <button type="button" id="sidenavToggle" class="btn-ocultar-adm">
        <span class="sidenav-toggler-icon"></span>
    </button>
    <div id="divContentAdm" class="d-flex flex-column justify-items-between">
        <div id="contentAdm" class="d-flex flex-column align-items-center mb-auto">
            <div class="container my-5">
                <h1>Bem vindo</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Você está logado como administrador</li>
                </ol>
                <?php require_once(__AGENDAMENTO_DIR__ . 'src/view/agendamento/agendamentoCalendar.php') ?>
            </div>
        </div>
        <?php include_once(__AGENDAMENTO_DIR__ . 'src/view/painel/footer.php') ?>
    </div>
</div>
<?php require_once('administradorJs.php'); ?>