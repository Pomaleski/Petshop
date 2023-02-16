<?php $ignoraSessao = true; ?>
<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Login</h1>
        <form action="<?= __AGENDAMENTO_HTTP__ ?>src/controller/loginController.php" method="POST" id="formLogin">
            <input type="hidden" name="action" value="login">
            <div class="form-floating mb-3" id="div-login">
                <input type="email" class="form-control" id="login" name="login" placeholder="Email">
                <label for="login" id="label-login">Email</label>
            </div>
            <div class="form-floating" id="div-password">
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                <label for="password" id="label-password">Senha</label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5" type="submit" id="btnLogin">
                    Entrar
                </button>
            </div>
        </form>
        <div class="mt-3 mb-5 link">
            <div>
                <a href="javascript:void(0)" onclick="login.recuperar()">
                    Esqueceu sua senha?
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
<?php require_once(__AGENDAMENTO_DIR__ . 'src/view/login/loginJs.php') ?>