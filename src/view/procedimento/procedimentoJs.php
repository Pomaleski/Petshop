<script>
    var procedimento = ({
        novo: function() {
            main.novo('procedimento');
        },
        create: function() {
            if (procedimento.validate()) {
                main.upload('/src/controller/procedimentoController.php', 'formProcedimentoCreate');
            }
        },
        update: function(cod) {
            adm.update('/src/controller/procedimentoController.php', cod);
        },
        delete: function(cod) {
            adm.delete('/src/controller/procedimentoController.php', cod);
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