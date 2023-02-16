<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand ms-3 my-1" href="/">
        <img src="<?= __AGENDAMENTO_HTTP__ ?>assets/img/logo.svg" alt="" width="40" height="30" class="d-inline-block align-text-top">
        <?= __AGENDAMENTO_TITULO__ ?>
    </a>
    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link ps-3 ps-md-auto" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ps-3 ps-md-auto" href="/#sobre">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ps-3 ps-md-auto" href="/#equipe">Equipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ps-3 ps-md-auto" href="/#servicos">Serviços</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ps-3 ps-md-auto" href="?page=agendamento">Agendamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ps-3 ps-md-auto" href="/#contato">Contato</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ps-3 ps-md-auto dropdown me-3">
                <a class="nav-link dropdown-toggle pe-0 ps-3 d-flex align-items-center" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="<?php
                        $objFotoNav = new usuarioModel($_SESSION);
                        $fotoNav = ($objFotoNav->read())[0];
                        if ($fotoNav['foto'] == null) {
                            echo "./assets/img/perfil-foto.svg";
                        } else {
                            echo __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $fotoNav['foto'];
                        }
                    ?>" width="30" height="30" class="rounded-circle d-lg-flex d-none me-2">
                    <?= isset($_SESSION['email']) ? $_SESSION['nome'] : 'Perfil' ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="?page=perfil">Perfil</a></li>
                    <li><a class="dropdown-item" href="?page=<?= $_SESSION['perfil'] == 'adm' ? 'admin' : 'perfil' ?>"><?= $_SESSION['perfil'] == 'adm' ? 'Painel Adm' : 'Configurações' ?></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" id="logout-nav" href="<?= __AGENDAMENTO_HTTP__ ?>src/controller/loginController.php?action=logout">Sair da Conta</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>