<?php $ignoraSessao = true; ?>
<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Recuperar Senha</h1>
        <form action="">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="emailRecuperar" placeholder="Email de Recuperação">
                <label for="emailRecuperar">Email de Recuperação</label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5" type="submit">
                    Trocar Senha
                </button>
            </div>
        </form>
        <div class="mt-3 mb-5 link">
            <div>
                <a href="javascript:void(0)" onclick="main.carregar('login')">
                    Já tem uma conta?
                </a>
            </div>
            <div class="mt-2">
                <a href="javascript:void(0)" onclick="main.novo('usuario')">
                    Não tem uma conta? Cadastre-se
                </a>
            </div>
        </div>
    </div>
</div>
<?php require_once(__AGENDAMENTO_DIR__ . 'src/view/login/loginJs.php')?>