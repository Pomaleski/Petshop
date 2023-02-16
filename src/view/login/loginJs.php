<script>
    var login = ({
        recuperar: function() {
            $.ajax({
                'url': '/src/controller/loginController.php?action=recuperar'
            }).done(function(data) {
                $('#content').html(data);
            })
        },
        loginValid: function() {
            var login = document.getElementById("login");
            var password = document.getElementById("password");

            var arr_camposObrigatorios = [login, password];
            return main.validateCamposObrigatorios("Esse campo é obrigatório!", arr_camposObrigatorios);
        },
        loginCreate: function() {
            if (jsLogin.loginValid()) {
                main.fAjaxPost('/src/controller/usuarioController.php?action=read', 'formLogin');
            }
        }
    })
</script>