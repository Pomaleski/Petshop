<script>
    var funcionario = ({
        novo: function() {
            main.novo('funcionario');
        },
        create: function() {
            if (funcionario.validate()) {
                main.upload('/src/controller/funcionarioController.php', 'formFuncionarioCreate');
            }
        },
        update: function(cod) {
            adm.update('/src/controller/funcionarioController.php', cod);
        },
        delete: function(cod) {
            adm.delete('/src/controller/funcionarioController.php', cod);
        },
        validate: function() {
            var fk_cod_usuario = document.getElementById("fk_cod_usuario");

            var validacao = [];
            validacao.push(validate.obrigatorio("Esse campo é obrigatório!", [fk_cod_usuario]));
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        }
    })
    $(document).ready(function() {
        $('#fk_cod_especialidade').select2();
        $('#fk_cod_usuario').select2();
    });
</script>