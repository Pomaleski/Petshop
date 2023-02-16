<script>
    var email = ({
        send: function() {
            if (email.validate()) {
                main.post('/src/controller/emailController.php', 'formEmailCreate');
            }
        },
        validate: function() {
            var para = document.getElementById("para");
            var assunto = document.getElementById("assunto");
            var conteudo = document.getElementById("conteudo");

            var validacao = [];
            validacao.push(validate.obrigatorio("Esse campo é obrigatório!", [para, assunto, conteudo]));
            validacao.push(validate.email(para));
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        }
    })
</script>