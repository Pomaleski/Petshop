<script>
    var pet = ({
        novo: function() {
            main.novo('pet');
        },
        create: function() {
            if (pet.validate()) {
                if (document.getElementById('foto').value !== null) {
                    $('#formPetCreate').attr("enctype","multipart/form-data");
                    main.upload('/src/controller/petController.php', 'formPetCreate');
                } else {
                    main.post('/src/controller/petController.php', 'formPetCreate');
                }
            }
        },
        update: function(cod) {
            adm.update('/src/controller/petController.php', cod);
        },
        delete: function(cod) {
            adm.delete('/src/controller/petController.php', cod);
        },
        validate: function() {
            var cod_usuario = "";
            var nome = document.getElementById("nome");
            var genero = document.getElementById("genero");
            var especie = document.getElementById("especie");
            var raca = document.getElementById("raca");
            var alergia = document.getElementById("alergia");
            var vacina = document.getElementById("vacina");
            var descricao = document.getElementById("descricao");
            var validacao = [];
            validacao.push(validate.obrigatorio("Esse campo é obrigatório!", [nome, genero, especie]));
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        }
    })
    $(document).ready(function() {
        $('#genero').select2();
        $('#fk_cod_especie').select2();
        $('#fk_cod_usuario').select2();
    });
</script>