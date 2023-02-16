document.addEventListener('DOMContentLoaded', (event) => {
    const sidenavToggle = document.querySelector('#sidenavToggle');
    if (sidenavToggle) {
        sidenavToggle.addEventListener('click', (element) => {
            document.body.classList.toggle('sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sidenav-toggled'));
        })
    }
})

var main = ({
    post(urlPost, idForm) {
        $.ajax({
            url: urlPost,
            method: 'post',
            data: $('#' + idForm).serialize()
        }).done((data) => {
            if (document.querySelector('#contentAdm') == null) {
                $('#content').html(data);
            } else {
                $('#contentAdm').html(data);
            }
        })
    },
    upload(urlUpload, idForm) {
        const formData = new FormData($('#' + idForm)[0]);
        $.ajax({
            url: urlUpload,
            method: 'post',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false
        }).done((data) => {
            if (document.querySelector('#contentAdm') == null) {
                $('#content').html(data);
            } else {
                $('#contentAdm').html(data);
            }
        })
    },
    carregar(page) {
        const url = '/src/controller/' + page + 'Controller.php?action=read';
        $.ajax({
            url: url
        }).done((data) => {
            $('#content').html(data);
        })
    },
    novo(page) {
        const url = '/src/controller/' + page + 'Controller.php?action=read';
        $.ajax({
            url: url
        }).done((data) => {
            $('#content').html(data);
        })
    }
})

var validate = ({
    obrigatorio(mensagem, camposObrigatorios) {
        camposObrigatorios.forEach((element) => {
            const elementValue = element.value;
            
            validate.resetClass(element);
            // verificação se o campo está vazio (para o visual)
            if (elementValue === "") {
                validate.addClass(element, mensagem);
            }
            // verificação se o campo está vazio (para o retorno)
            // criação de um array, quando o campo está vazio, adiciona false, senão adiciona true
            validacao = [];
            if (elementValue === "") {
                validacao.push(false);
            } else {
                validacao.push(true);
            }
        });
        // função retorna true se não tiver nenhum false no array
        if (!(validacao.includes(false))) {
            return true;
        } else {
            return false;
        }
    },
    igual(mensagem, campo, campoConfirm) {
        const campoValue = campo.value;
        const campoConfirmValue = campoConfirm.value;
        
        if ((campoValue !== "") && (campoConfirmValue !== "")) {
            if (!(campoValue === campoConfirmValue)) {
                main.addClassValidate(campoConfirm, mensagem);
            }
            validacao = [];
            if (!(campoValue === campoConfirmValue)) {
                validacao.push(false);
            } else {
                validacao.push(true);
            }
            if (!(validacao.includes(false))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    },
    // Função para validar o email
    // Parametro: elemento do campo que o email foi escrito
    email(element) {
        // expressão regular para validar o email
        var check = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi;
        if (!(check.test(element.value))) {
            validate.addClass(element, "Email inválido!");
            return false;
        } else {
            return true;
        }
    },
    cpf(cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf == '') return false;
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;
        add = 0;
        for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        add = 0;
        for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;
    },
    // Função para adicionar classes que destacam os campos com erro
    // Parametro: elemento que está inválido, mensagem que vai aparecer em baixo do campo
    addClass(element, mensagem) {
        // add da classe do campo
        element.classList.add("campo-invalido");
        // add da classe da label
        if (document.getElementById("label-" + element.id) != null) document.getElementById("label-" + element.id).classList.add("label-invalido");
        // criação do elemento span, para mensagem
        if (document.getElementById("msg-" + element.id) == null) {
            var span = document.createElement("span");
            // criação da mensagem
            span.innerHTML = mensagem + "<br />";
            // add da classe da mensagem
            span.classList.add("msg-invalido");
            // set do id
            span.id = "msg-" + element.id;
            // append
            document.getElementById("div-" + element.id).appendChild(span);
        } else {
            // adição da mensagem, caso o span ja tenha sido criado
            document.getElementById("msg-" + element.id).innerHTML += mensagem + "<br />";
        }
    },
    // Função para tirar as classes dos elementos
    // Parametro: elemento
    resetClass(element) {
        // reset da classe do campo
        element.classList.remove("campo-invalido");
        // reset da classe da label
        if (document.getElementById("label-" + element.id) != null) document.getElementById("label-" + element.id).classList.remove("label-invalido");
        // reset da classe da mensagem
        if (document.getElementById("msg-" + element.id) != null) document.getElementById("msg-" + element.id).remove();
    }
})