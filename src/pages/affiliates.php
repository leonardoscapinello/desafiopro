<?php
$coach = new Accounts($account->getIdCoach());
?>

<div class="section half-pad blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-1 col-lg-1 col-sm-12">
                <?php if ($account->getPersonalPoints() > 500) { ?>
                    <img src="<?= SITE_URL ?>/static/images/trophy-gold.png" style="height: 80px"/>
                <?php } else if ($account->getPersonalPoints() > 100) { ?>
                    <img src="<?= SITE_URL ?>/static/images/trophy-silver.png" style="height: 80px"/>
                <?php } else { ?>
                    <img src="<?= SITE_URL ?>/static/images/trophy-bronze.png" style="height: 80px"/>
                <?php } ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12">
                <h3 class="text light"><?= $date->salutation() ?>, <?= explode(" ", $account->getName())[0] ?>.</h3>
                <h6 class="text light" style="font-weight: 300;font-size: 15px;">
                    <?php if ($account->getPersonalPoints() >= 500) { ?>
                        Seu nível: <b>Ouro</b>
                    <?php } else if ($account->getPersonalPoints() >= 100) { ?>
                        Seu nível: <b>Prata</b>
                    <?php } else { ?>
                        Seu nível: <b>Bronze</b>
                    <?php } ?>
                    <span>(<?= $account->getPersonalPoints() ?> pontos)</span>
                </h6>
            </div>

        </div>
    </div>
</div>

<div class="section half-pad">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-12" style="position: relative;">
                <div class="sticky" style="position: sticky;top: 20px">
                    <h4>Seu Link</h4>
                    <p style="margin-top: 10px;text-align: justify;font-size: 14px;">Compartilhe esse link sempre que
                        quiser
                        convidar um
                        conhecido para o
                        desafio, <b>assim você garante
                            benefícios exclusivos.</b></p>
                    <p style="margin-top: 10px;font-size: 14px;">Clique no link abaixo para selecionar e copiar o
                        texto.</p>
                    <div class="input--line">
                        <input type="text" name="affiliate" onClick="clipboard(this);return false"
                               value="<?= SITE_URL . "c/" . md5($account->getIdAccount()) ?>" readonly
                               class="look-as-text"/>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-12">

                <h4>Afiliados</h4>
                <br/>
                <?php

                $affiliates = $account->getAllAffiliates();
                for ($i = 0; $i < count($affiliates); $i++) {
                    ?>
                    <div class="affiliate-line">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-sm-12">
                                <div class="name"><?= $text->lowercase($affiliates[$i]['name']); ?></div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-12">
                                <div class="points displayDesk"><?= notempty($affiliates[$i]['personal_id']) ? $affiliates[$i]['personal_id'] : "-" ?></div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-12">
                                <div class="points"><?= $affiliates[$i]['personal_points'] ?> pts</div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-12 affiliate-btn right">
                                <button id="modal-open-affiliate" data-modal="modal-subscribe"
                                        onClick="audit(<?= $affiliates[$i]['id_account'] ?>);return false;">Atualizar
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php
$audit = get_request("audit");
$personal_id = get_request("personal_id");
$personal_point = get_request("personal_point");
if (not_empty($audit)) {

    $affiliateLoaded = new Accounts($text->base64_decode($audit));

    if (notempty($personal_point)) {
        $ad = $affiliateLoaded->updateAudit($audit, $personal_id, $personal_point);
        if ($ad) {
            header("location: " . SITE_URL . "affiliates?audit=" . $audit . "&s=Y");
            die;
        } else {
            header("location: " . SITE_URL . "affiliates?audit=" . $audit . "&s=N");
            die;
        }
    }


    ?>
    <form action="" method="GET">
        <input type="hidden" name="audit" id="audit" value="<?= $audit ?>"/>
        <section>
            <div class="modal" id="modal-affiliate">
                <div class="modal-frame">
                    <div class="modal-close" onClick="window.location.href = '<?= SITE_URL ?>affiliates';return false;">
                        X
                    </div>
                    <h5 align="center">Atualize os Dados Pessoais</h5>
                    <?php if (get_request("s") === "Y") { ?>
                        <b class="text pink" style="display: block;margin-top: 20px;text-align: center;background: #0ABB87;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">Atualizado com Sucesso</b>
                    <?php } ?>
                    <?php if (get_request("s") === "N") { ?>
                        <b class="text pink" style="display: block;margin-top: 20px;text-align: center;background: #ed145b;border-radius: 5px;color: #FFF;padding: 10px;box-sizing: border-box">Não foi possível atualizar, tente novamente.</b>
                    <?php } ?>
                    <div class="form">
                        <div class="input--line">
                            <label for="name">Nome Completo:</label>
                            <div class="readonly-ipt" style="text-transform: capitalize">
                                <?= $text->lowercase($affiliateLoaded->getName()); ?>
                            </div>
                        </div>
                        <div class="input--line">
                            <label for="personal_id">Identificação do Cliente</label>
                            <input type="tel" value="<?= $affiliateLoaded->getPersonalId() ?>" name="personal_id"
                                   id="personal_id" maxlength="10">
                        </div>
                        <div class="input--line">
                            <label for="personal_point">Pontos Adquiridos:</label>
                            <input type="tel" value="<?= $affiliateLoaded->getPersonalPoints() ?>" name="personal_point"
                                   id="personal_point" maxlength="16">
                        </div>
                        <p style="font-size: .75em;line-height: 20px;margin-bottom: 20px;">
                            Ao continuar você confirma que os dados são verdadeiros e assume a responsabilidade sob
                            as informações imputadas.
                        </p>
                        <div class="input--line" align="center">
                            <button>Salvar Alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script type="text/javascript">
        window.setTimeout(function () {
            $("#modal-affiliate").fadeIn(300).children().slideDown(300);
        }, 100);
    </script>
<?php } ?>

<script type="text/javascript">
    function audit(id) {
        window.location.href = "<?=SITE_URL?>affiliates?audit=" + btoa(id) + "&data=" + btoa(btoa(btoa(id)));
    }
</script>
