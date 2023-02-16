<nav id="sidenav" class="sb-sidenav accordion sb-sidenav-dark p-4 d-flex flex-column">
    <div class="fw-bold mt-4">
        Painel Administrativo
    </div>
    <a class="nav-link d-flex justify-content-between px-0" data-bs-toggle="collapse" href="#collapseSidenav" role="button" aria-expanded="false" aria-controls="collapseSidenav">
        Cadastros
        <svg class="svg-inline--fa fa-angle-down align-self-center" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
            <path fill="currentColor" d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"></path>
        </svg>
    </a>
    <div class="collapse" id="collapseSidenav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('usuario')">Usuário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('pet')">Pet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('funcionario')">Funcionário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('especialidade')">Especialidade</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('procedimento')">Procedimento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('especie')">Espécie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.carregar('agendamento')">Agendamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="adm.novo('email')">Email</a>
            </li>
        </ul>
    </div>
</nav>