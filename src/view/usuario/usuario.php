<?php
    $objUsuario = new usuarioModel($_SESSION);
    $infoUsuario = ($objUsuario->read())[0];
?>
<div class="container my-5">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center">
            <img src="<?= __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $infoUsuario['foto'] ?>" class="rounded-circle" width="124px" height="124px">
            <h1 class="ms-2"><?= $infoUsuario['nome'] ?></h1>
        </div>
        <h2 class="mt-5">Pets</h2>
        <div class="scroll d-flex">
            <ul class="justify-content-start">
                <li>
                    <a class="link-pet" href="">
                        <div class="pet-scroll-item p-3">
                            <img src="../../assets/img/background.png" class="rounded-circle">
                            Nome do Pet
                        </div>
                    </a>
                </li>
                <li>
                    <a class="link-pet" href="?page=cadastro-pet">
                        <div class="pet-scroll-item pet-scroll-item-add p-3">
                            <img src="../../assets/img/add.svg" class="rounded-circle">
                            Adicionar Pet
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="?page=agendamento">
                    <button class="button btn btn-lg btn-warning mt-5" type="button">
                        Agendamentos
                    </button>
                </a>
            </div>
            <div class="col d-flex justify-content-center">
                <button class="button btn btn-lg btn-info mt-5" type="button" href="javascript:void(0)" onclick="usuario.config()">
                    Configurações
                </button>
            </div>
        </div>
    </div>
</div>
<?php require_once('usuarioJs.php'); ?>