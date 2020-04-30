<?php

$user = get_request("u");

if ($user !== null) {
    $account = new Accounts(base64_decode($user));

    $password = get_request("password");
    $cpassword = get_request("cpassword");

    if ($password !== null && $cpassword !== null) {
        $confirm = $account->resetPassword($password, $cpassword);
        if ($confirm) {
            header("location: " . SITE_URL . "cadastro/confirmar?u=" . base64_encode($account->getIdAccount()));
            die;
        }
    }


    ?>
    <section>
        <div class="section half-pad blue-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-1 col-lg-1 col-sm-12 text light">
                        <h2 style="font-size: 72px"><i class="far fa-lock"></i></h2>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-12">
                        <h4 class="text light" style="margin-top: 7px">Segurança</h4>
                        <p class="text light" style="margin-top: 7px">Você usará essa senha para entrar em sua área de
                            membros.</p>
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
                            <h5>Crie uma senha para sua conta</h5>
                            <div class="form">
                                <div class="input--line">
                                    <label for="password">E-mail</label>
                                    <div class="readonly-ipt"><?= $account->getEmail() ?></div>
                                </div>
                                <div class="input--line">
                                    <label for="password">Senha</label>
                                    <input type="password" value="" name="password" id="password">
                                </div>
                                <div class="input--line">
                                    <label for="cpassword">Confirme sua senha</label>
                                    <input type="password" value="" name="cpassword" id="cpassword">
                                </div>
                                <div class="input--line" align="center">
                                    <button class="modal-open" data-modal="modal-subscribe">Continuar para validação
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
<?php } ?>