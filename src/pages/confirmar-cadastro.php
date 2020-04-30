<?php
$user = get_request("u");
$token = get_request("token");
$t = get_request("t");

if ($user !== null) {
    $account = new Accounts(base64_decode($user));
    if ($account->isConfirmed()) {

        $session->setUsername($account->getEmail());
        $session->setPassword($account->getEmail());
        $session->createSession(true);

        header("location: " . SITE_URL . "login?e=" . base64_encode($account->getEmail()) . "&confirmed=Y");
        die;
    }
    if ($t !== null) {
        $token = base64_decode($t);
    }
    if ($token !== null) {
        $confirm = $account->confirm($token);
        if ($confirm) {
            header("location: " . SITE_URL . "cadastro/confirmar?u=" . base64_encode($account->getIdAccount()) . "&s=Y");
            die;
        }
    }

    $session->cleanSession();

    ?>
    <?php if (!$account->isConfirmed()) { ?>
        <section>
            <div class="section half-pad blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-1 col-lg-1 col-sm-12 text light">
                            <h2 style="font-size: 72px"><i class="far fa-shield"></i></h2>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <h4 class="text light" style="margin-top: 7px">Última Etapa!</h4>
                            <p class="text light" style="margin-top: 7px">Você está a um passo da transformação.</p>
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
                                <h5>Enviamos uma confirmação por e-mail, se você recebeu, digite-a abaixo para
                                    garantirmos
                                    sua segurança.</h5>
                                <div class="form">
                                    <div class="input--line">
                                        <label for="password">E-mail</label>
                                        <div class="readonly-ipt"><?= $account->getEmail() ?></div>
                                    </div>
                                    <div class="input--line">
                                        <label for="token">Código de Verificação</label>
                                        <input type="text" value="" class="token" name="token" id="token"
                                               style="text-align: center" onkeyup="v();">
                                        <div class="loader loader--style2" id="ldr" title="1">
                                            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="25px" height="25px" viewBox="0 0 50 50"
                                                 style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                          <path fill="#000"
                                                d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                              <animateTransform attributeType="xml"
                                                                attributeName="transform"
                                                                type="rotate"
                                                                from="0 25 25"
                                                                to="360 25 25"
                                                                dur="0.6s"
                                                                repeatCount="indefinite"/>
                                          </path>
                                          </svg>
                                        </div>
                                    </div>
                                    <div class="input--line" align="center" id="btn" style="display: none">
                                        <button class="modal-open" data-modal="modal-subscribe">Continuar para área de
                                            membros
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    <?php } else { ?>
        <section>
            <div class="section half-pad blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-1 col-lg-1 col-sm-12 text light">
                            <h2 style="font-size: 72px"><i class="far fa-shield-check"></i></h2>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <h4 class="text light" style="margin-top: 7px">Por aqui, tudo certo!</h4>
                            <p class="text light" style="margin-top: 7px">Sua conta foi confirmada, estamos
                                redirecionando você para o login.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <script type="text/javascript">
        function v() {
            let t = "<?=md5($account->getAccountToken())?>";
            let f = document.getElementById("token");
            let l = document.getElementById("ldr");
            let b = document.getElementById("btn");
            var hash = CryptoJS.MD5(f.value);
            if (f.value !== "") {
                if (hash.toString() === t) {
                    f.className = "token processing";
                    window.setTimeout(function () {
                        l.style.display = "none";
                        b.style.display = "block";
                        f.className = "token success";
                    }, 250);
                } else {
                    f.className = "token failed";
                    l.style.display = "block";
                    b.style.display = "none";

                }
            } else {
                f.className = "token";
                l.style.display = "none";
                b.style.display = "none";
            }
        }
    </script>
<?php } ?>