<?php
if ($account->getCoachRequest() !== null) {
    $newCoach = new Accounts($account->getCoachRequest());
}
?>
<section>
    <div class="section half-pad blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-sm-12 text light">
                    <h2 style="font-size: 72px"><i class="far fa-key"></i></h2>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <h4 class="text light" style="margin-top: 7px">Crie sua Conta</h4>
                    <p class="text light" style="margin-top: 7px">Crie sua conta gratuita</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="section half-pad">
        <form action="./cadastro/concluir" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-12">


                        <div class="form">

                            <?php if (get_request("attempt") === "0") { ?>
                                <b class="text pink"
                                   style="display: block;margin-top: 20px;text-align: center;background: #ed145b;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">Já
                                    existe um cadastro com esse e-mail.</b>

                            <?php } elseif (get_request("attempt") === "-1") { ?>
                                <b class="text pink"
                                   style="display: block;margin-top: 20px;text-align: center;background: #ed145b;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">
                                    Seu nome precisa estar preenchido corretamente
                                </b>
                            <?php } elseif (get_request("attempt") === "-2") { ?>
                                <b class="text pink"
                                   style="display: block;margin-top: 20px;text-align: center;background: #ed145b;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">
                                    Digite um e-mail válido
                                </b>
                            <?php } elseif (get_request("attempt") === "-2") { ?>
                                <b class="text pink"
                                   style="display: block;margin-top: 20px;text-align: center;background: #ed145b;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">
                                    Digite um telefone válido
                                </b>
                            <?php } ?>


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
                            <p style="font-size: .75em;line-height: 20px;margin-bottom: 20px;">Ao continuar, você
                                concorda com
                                os Termos de Uso e
                                Políticas de Privacidade, bem como demais termos vigentes nessa plataforma.</p>
                            <div class="input--line" align="center">
                                <button class="modal-open" data-modal="modal-subscribe">Continuar para senha
                                </button>
                            </div>
                            <div class="input--line" align="center">
                                <a href="./login" style="font-size: 13px;margin-top: 10px;">Já tenho uma conta.
                                    Entrar.</a>
                            </div>

                        </div>
                    </div>
                    <div class="offset-1"></div>
                    <div class="col-xl-5 col-lg-5 col-sm-12">
                        <?php if ($account->getCoachRequest() !== null) { ?>
                        <div class="coach">
                            <div class="row">
                                <?php if ($newCoach->getProfilePicture() !== null) { ?>
                                    <div class="col-xl-3 col-lg-3 col-sm-12 displayDesk">
                                        <img src="<?= $newCoach->getProfilePicture() ?>"
                                             style="border-radius:50%;border: 4px #FFF solid;" height="100%">
                                    </div>
                                <?php } ?>
                                <div class="col-xl-9 col-lg-9 col-sm-12">
                                    <p>Seu Coach</p>
                                    <h4><?= $newCoach->getName() ?></h4>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
