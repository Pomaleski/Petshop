<script>
    var especie = ({
        novo: function() {
            main.novo('especie');
        },
        create: function() {
            if (especie.validate()) {
                main.post('/src/controller/especieController.php', 'formEspecieCreate');
            }
        },
        update: function(cod) {
            adm.update('/src/controller/especieController.php', cod);
        },
        delete: function(cod) {
            adm.delete('/src/controller/especieController.php', cod);
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