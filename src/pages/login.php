<?php
$email_loaded = get_request("e");
if ($email_loaded !== null) $email_loaded = base64_decode($email_loaded);
$change_email = get_request("ch");

$email = get_request("email");
$password = get_request("password");

if ($email_loaded !== null && $email === null) {
    $email = $email_loaded;
}

if ($email !== null && $password !== null) {
    $session->setUsername($email);
    $session->setPassword($password);
    $s = $session->createSession();
    if ($s) {
        header("location: " . SITE_URL);
        die;
    } else {
        header("location: " . LOGIN_URL . "?attempt=0");
        die;
    }
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
                    <h4 class="text light" style="margin-top: 7px">Fazer Login</h4>
                    <p class="text light" style="margin-top: 7px">Seu conteúdo já esta te esperando, faça login para
                        continuar</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="section half-pad">
        <form action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-12">


                        <h5>Seja Bem-vindo(a) de volta!</h5>
                        <div class="form">

                            <?php if (get_request("attempt") === "0") { ?>
                                <b class="text pink"
                                   style="display: block;margin-top: 20px;text-align: center;background: #ed145b;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">
                                    Usuário ou Senha incorretos
                                </b>
                            <?php } ?>

                            <?php if ($email_loaded !== null && $change_email === null) { ?>
                                <div class="input--line">
                                    <label for="email">E-mail</label>
                                    <div class="readonly-ipt"><?= $email_loaded ?>
                                        <a href="<?= $url->addQueryString(array("ch" => "Y")) ?>"
                                           style="color:#ed145b;font-size: 13px;margin-left: 10px;">Não é você?</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="input--line">
                                    <label for="email">E-mail</label>
                                    <input type="email" value="<?= $email_loaded ?>" name="email" id="email">
                                </div>
                            <?php } ?>
                            <div class="input--line">
                                <label for="password">Senha</label>
                                <input type="password" value="" name="password" id="password">
                            </div>
                            <div class="input--line" align="center">
                                <button class="modal-open" data-modal="modal-subscribe">Continuar para área de membros
                                </button>
                            </div>
                            <div class="input--line" align="center">
                                <a href="./cadastro" style="font-size: 13px;margin-top: 10px;">Não tem uma conta? Crie
                                    grátis agora mesmo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>