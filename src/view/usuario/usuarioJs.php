<script>
    var usuario = ({
        novo() {
            main.novo('usuario');
        },
        create() {
            if (usuario.validate()) {
                if (document.getElementById('foto').value !== null) {
                    $('#formUsuarioCreate').attr("enctype","multipart/form-data");
                    main.upload('/src/controller/usuarioController.php', 'formUsuarioCreate');
                } else {
                    main.post('/src/controller/usuarioController.php', 'formUsuarioCreate');
                }
            }
        },
        update(cod) {
            adm.update('/src/controller/usuarioController.php', cod);
        },
        delete(cod) {
            adm.delete('/src/controller/usuarioController.php', cod);
        },
        validate() {
            const nome = document.getElementById("nome");
            const data_nascimento = document.getElementById("data_nascimento");
            const cpf = document.getElementById("cpf");
            const cep = document.getElementById("cep");
            const numero_residencia = document.getElementById("numero_residencia");
            const email = document.getElementById("email");
            const confirmar_email = document.getElementById("confirmar_email");
            const telefone = document.getElementById("telefone");
            const senha = document.getElementById("senha");
            const confirmar_senha = document.getElementById("confirmar_senha");

            let validacao = [];

            if (senha !== null && confirmar_email !== null && confirmar_senha !== null) {
                var arrayObrigatorios = [nome, data_nascimento, cpf, email, confirmar_email, telefone, senha, confirmar_senha];
            } else {
                var arrayObrigatorios = [nome, data_nascimento, cpf, email, telefone];
            }

            validacao.push(validate.obrigatorio("Esse campo é obrigatório!", arrayObrigatorios));
            if (confirmar_email !== null) validacao.push(validate.igual("Os campos de emails estão diferentes!", email, confirmar_email));
            if (confirmar_senha !== null) validacao.push(validate.igual("Os campos de senhas estão diferentes!", senha, confirmar_senha));
            validacao.push(validate.email(email));
            validacao.push(usuario.cpf(cpf));
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        },
        cpf(element) {
            if (!(validate.cpf(element.value))) {
                validate.addClass(element, "CPF inválido!");
                return false;
            } else {
                return true;
            }
        },
        config() {
            $.ajax({
                url: '/src/controller/usuarioController.php?action=config'
            }).done((data) => {
                $('#content').html(data);
            })
        },
        tela() {
            $.ajax({
                url: '/src/controller/usuarioController.php?action=tela'
            }).done((data) => {
                $('#content').html(data);
            })
        },
        abrirApagarFoto(cod, nome) {
            var modal = document.createElement('div');
                
            modal.innerHTML = `
                <div class="modal fade" id="modalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body px-5 pb-2 pt-4">
                                Deseja apagar a foto do usuário: ${nome}, código: ${cod}
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button id="btnAceitar" type="button" class="btn btn-warning">Apagar</button>
                                <button id="btnModalFoto" type="button" class="btn btn-danger">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('contentAdm').appendChild(modal);
            
            var modalFoto = new bootstrap.Modal(document.getElementById('modalFoto'), {
                keyboard: false
            });

            document.getElementById('btnAceitar').addEventListener('click', () => {
                $.ajax({
                    url: '/src/controller/usuarioController.php',
                    method: 'post',
                    data: {
                        action: 'apagarFoto',
                        cod: cod,
                    }
                }).done((data) => {
                    if (document.querySelector('#contentAdm') == null) {
                        $('#content').html(data);
                    } else {
                        $('#contentAdm').html(data);
                    }
                })
            })

            document.getElementById('btnModalFoto').addEventListener('click', () => {
                modalFoto.dispose();
                document.getElementById('modalFoto').remove();
            })

            modalFoto.show();
        }
    })
    $(document).ready(function() {
        $('#fk_cod_cidade').select2();
    });
</script>