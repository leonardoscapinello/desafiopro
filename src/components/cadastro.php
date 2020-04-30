<form action="./cadastro/concluir" method="POST">
    <section>
        <div class="modal" id="modal-subscribe">
            <div class="modal-frame">
                <div class="modal-close">X</div>
                <h5 align="center">Preencha o formulário para garantir sua vaga agora mesmo</h5>
                <div class="form">
                    <div class="input--line">
                        <label for="name">Nome Completo:</label>
                        <input type="text" value="<?= $name ?>" name="name" id="name" required>
                    </div>
                    <div class="input--line">
                        <label for="email">Seu e-mail:</label>
                        <input type="email" value="<?= $email ?>" name="email" id="email" required>
                    </div>
                    <div class="input--line">
                        <label for="phone">WhatsApp:</label>
                        <input type="tel" value="<?= $phone ?>" name="phone" id="phone" required>
                    </div>
                    <p style="font-size: .75em;line-height: 20px;margin-bottom: 20px;">Ao continuar, você concorda com
                        os Termos de Uso e
                        Políticas de Privacidade, bem como demais termos vigentes nessa plataforma.</p>
                    <div class="input--line" align="center">
                        <button class="modal-open" data-modal="modal-subscribe">Continuar para senha</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
