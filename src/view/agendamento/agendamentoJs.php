<script>
    var agendamento = ({
        novo() {
            main.novo('agendamento');
        },
        create() {
            if (agendamento.validate()) {
                main.post('/src/controller/agendamentoController.php', 'formAgendamentoCreate');
            }
        },
        update(cod) {
            adm.update('/src/controller/agendamentoController.php', cod);
        },
        delete(cod) {
            adm.delete('/src/controller/agendamentoController.php', cod);
        },
        validate() {
            const fk_cod_pet = document.getElementById("fk_cod_pet");
            const fk_cod_procedimento = document.getElementById("fk_cod_procedimento");
            const fk_cod_funcionario = document.getElementById("fk_cod_funcionario");
            const data = document.getElementById("data");
            const hora = document.getElementById("hora");
            
            let validacao = [];
            const arrayObrigatorios = [fk_cod_pet, fk_cod_procedimento, fk_cod_funcionario, data, hora];
            validacao.push(validate.obrigatorio("Esse campo é obrigatório!", arrayObrigatorios));
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        },
        modal(dataCalendar) {
            $.ajax({
                url: '/src/controller/agendamentoController.php?action=new',
                data: { dataCalendar: dataCalendar }
            }).done((data) => {
                var modalJs = document.createElement('div');
                
                modalJs.innerHTML = `
                    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                `
                                    + data +
                                `
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button id="btnModal" type="button" class="btn btn-danger" onclick"deleteModal()">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                document.getElementById('contentAdm').appendChild(modalJs);
                
                var modalFinal = new bootstrap.Modal(document.getElementById('modal'), {
                    keyboard: false
                });

                document.getElementById('btnModal').addEventListener('click', () => {
                    modalFinal.dispose();
                    document.getElementById('modal').remove();
                })

                modalFinal.show();
                
                $('#fk_cod_pet').select2({ dropdownParent: $('#modal') });
                $('#fk_cod_procedimento').select2({ dropdownParent: $('#modal') });
                $('#fk_cod_funcionario').select2({ dropdownParent: $('#modal') });
                $('#hora').select2({ dropdownParent: $('#modal') });
            })
        }
    })
    document.addEventListener('DOMContentLoaded', () => {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            //plugins: [ interactionPlugin ],
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            dateClick: (info) => {
                agendamento.modal(info.dateStr);
            },
        });
        calendar.render();
    })
</script>