<script>
    var especialidade = ({
        novo: function() {
            main.novo('especialidade');
        },
        create: function() {
            if (especialidade.validate()) {
                main.post('/src/controller/especialidadeController.php', 'formEspecialidadeCreate');
            }
        },
        update: function(cod) {
            adm.update('/src/controller/especialidadeController.php', cod);
        },
        delete: function(cod) {
            adm.delete('/src/controller/especialidadeController.php', cod);
        },
        validate: function() {
            var nome = document.getElementById("nome");
            var validacao = [];
            validacao.push(validate.obrigatorio("Esse campo é obrigatório!", [nome]));
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        }
    })
</script>