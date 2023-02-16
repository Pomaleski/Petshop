<div class="container my-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Enviar Email</h1>
        <form id="formEmailCreate">
            <input type="hidden" name="action" id="action" value="send">
            <div class="form-floating readonly mt-3" id="div-de">
                <input type="email" class="form-control" name="de" id="de" placeholder="De" value="<?= __EMAIL__ ?>" readonly>
                <label for="de" id="label-de">De</label>
            </div>
            <div class="form-floating" id="div-para">
                <input type="email" class="form-control" name="para" id="para" placeholder="Para" value="<?= $para ?>">
                <label for="para" id="label-para">Para</label>
            </div>
            <div class="form-floating" id="div-assunto">
                <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto" value="<?= $assunto ?>">
                <label for="assunto" id="label-assunto">Assunto</label>
            </div>
            <div class="mt-3" id="div-conteudo">
                <label for="conteudo" id="label-conteudo">Conteúdo</label>
                <textarea class="form-control" name="conteudo" id="conteudo" rows="5" value="<?= $conteudo ?>"></textarea>    
            </div>
            <div class="d-flex justify-content-center">
                <button class="button btn btn-lg btn-warning mt-5" type="button" onclick="email.send()">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('emailJs.php'); ?>