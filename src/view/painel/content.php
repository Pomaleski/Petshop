<!--Carousel-->
<div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./assets/img/carousel1.png" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/img/carousel2.png" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/img/carousel3.png" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <!--Sobre-->
        <h2 id="sobre" class="mb-2">Sobre</h2>
        <p class="text-break text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <!--Equipe-->
        <h2 id="equipe" class="mb-2 mt-5">Equipe</h2>
        <div class="scroll">
            <ul>
                <?php
                    $objFuncionario = new funcionarioModel(null);
                    $listFuncionario = $objFuncionario->list();
                    foreach($listFuncionario as $funcionario) {
                        $objUsuario = new usuarioModel(null);
                        $objUsuario->setCod($funcionario['fk_cod_usuario']);
                        $usuario = ($objUsuario->read())[0];
                ?>
                    <li class="text-center">
                        <img src="<?=
                            $usuario['foto'] == null ? '../../assets/img/perfil-foto.svg' : __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $usuario['foto']
                        ?>" class="rounded-circle equipe-img" width="124px" height="124px"></br>
                        <?= $usuario['nome'] ?>
                    </li>
                <?php } ?>
                <li class="text-center">
                    <img src="../../assets/img/perfil-foto.svg" class="rounded-circle equipe-img"></br>
                    Veterinário 2
                </li>
            </ul>
        </div>
        <!--Serviços-->
        <h2 id="servicos" class="mb-2 mt-5">Serviços</h2>
        <div class="scroll">
            <ul>
                <?php
                    $objProcedimento = new procedimentoModel(null);
                    $listProcedimento = $objProcedimento->list();
                    foreach($listProcedimento as $procedimento) {
                ?>
                    <li class="text-center">
                        <img src="<?=
                            $procedimento['foto'] == null ? '../../assets/img/background.png' : __AGENDAMENTO_DIR_UPLOAD_HTTP__ . $procedimento['foto']
                        ?>" class="rounded-circle" width="124px" height="124px"></br>
                        <?= $procedimento['nome'] ?>
                    </li>
                <?php } ?>
                <li class="text-center">
                    <img src="../../assets/img/background.png" class="rounded-circle"></br>
                    Serviço 2
                </li>
            </ul>
        </div>
        <!--Botão-->
        <a href="?page=agendamento">
            <button class="button btn btn-lg btn-warning mt-5" type="button">
                Fazer Agendamento
            </button>
        </a>
        <!--Contato-->
        <h2 id="contato" class="mb-2 mt-5">Contato</h2>
        <p class="text-break">
            empresa@petshop.com
            (888) 8888-8888
        </p>
    </div>
</div>