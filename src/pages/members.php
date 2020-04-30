<?php
$coach = new Accounts($account->getIdCoach());
?>

<div class="section half-pad blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-1 col-lg-1 col-sm-12" style="text-align: center">
                <?php if ($account->getPersonalPoints() > 500) { ?>
                    <img src="<?= SITE_URL ?>/static/images/trophy-gold.png" style="height: 80px"/>
                <?php } else if ($account->getPersonalPoints() > 100) { ?>
                    <img src="<?= SITE_URL ?>/static/images/trophy-silver.png" style="height: 80px"/>
                <?php } else { ?>
                    <img src="<?= SITE_URL ?>/static/images/trophy-bronze.png" style="height: 80px"/>
                <?php } ?>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12">
                <div class="members-profile">
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
            <div class="col-xl-5 col-lg-6 col-sm-12 right">
                <div class="coach-profile">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-sm-12">
                            <h6 class="text light" style="font-weight: 300;font-size: 15px;">Seu Coach</h6>
                            <h3 class="text light" style="margin-top: -8px">
                                <?= $coach->getName() ?>
                            </h3>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-sm-12">
                            <figure>
                                <img class="profile_image"
                                     src="<?= $coach->getProfilePicture(); ?>"
                                     alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section half-pad white-bg members">
    <div class="container">
        <?php
        $ar = array("exercicio" => "Exercicio em Casa", "alimentacao" => "Alimentação Saudável");
        $contents = new Contents();
        foreach ($ar as $key => $value) {
            $c_list = $contents->getContentsByCategory($key);
            ?>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <h5 style="margin-bottom: 20px"><?= $value ?></h5>
                    <div class="owl-carousel carousel carousel--<?= $key ?>">
                        <?php for ($i = 0; $i < count($c_list); $i++) { ?>
                            <?php if ($account->getPersonalPoints() < $c_list[$i]['required_points']) {

                                $percentage = intval($account->getPersonalPoints());
                                $totalWidth = intval($c_list[$i]['required_points']);

                                $new_width = ($percentage / $totalWidth) * 100;

                                ?>

                                <div class="ex-item locked">
                                    <figure>
                                        <div class="locked-figure">
                                            <svg aria-hidden="true" focusable="false" data-prefix="far"
                                                 data-icon="lock-alt"
                                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 class="svg-inline--fa fa-lock-alt fa-w-14 fa-7x">
                                                <path fill="currentColor"
                                                      d="M224 412c-15.5 0-28-12.5-28-28v-64c0-15.5 12.5-28 28-28s28 12.5 28 28v64c0 15.5-12.5 28-28 28zm224-172v224c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V240c0-26.5 21.5-48 48-48h32v-48C80 64.5 144.8-.2 224.4 0 304 .2 368 65.8 368 145.4V192h32c26.5 0 48 21.5 48 48zm-320-48h192v-48c0-52.9-43.1-96-96-96s-96 43.1-96 96v48zm272 48H48v224h352V240z"
                                                      class=""></path>
                                            </svg>
                                        </div>
                                        <div class="progress">
                                            <div class="tooltip">
                                                <?= $account->getPersonalPoints() ?>
                                                /<?= $c_list[$i]['required_points'] ?>
                                                pontos
                                            </div>
                                            <div class="progress-bar" style="width: <?= $new_width ?>%">
                                                <div class="progress-shadow"></div>
                                            </div>
                                        </div>
                                    </figure>
                                    <p class="link">#<?= $c_list[$i]['content_sequence'] ?>
                                        - <?= $c_list[$i]['content_title'] ?></p>
                                </div>

                            <?php } else { ?>
                                <div class="ex-item">
                                    <figure>
                                        <img src="./static/images/thumbs/<?= $c_list[$i]['content_thumb'] ?>"
                                             alt="<?= $c_list[$i]['content_title'] ?>">
                                        <div class="time">
                                            <i class="far fa-clock"></i> <?= $c_list[$i]['video_time'] ?>
                                        </div>
                                        <h4>
                                            #<?= sprintf('%02d', $c_list[$i]['content_sequence']) ?></h4>
                                        <div class="title">
                                            <?= $c_list[$i]['content_title'] ?>
                                        </div>
                                    </figure>
                                    <a href="<?= SITE_URL ?>members/lesson/<?= $c_list[$i]['id_content'] ?>/<?= md5($c_list[$i]['content_title']) ?>">
                                        <p class="link">#<?= $c_list[$i]['content_sequence'] ?>
                                            - <?= $c_list[$i]['content_title'] ?></p>
                                    </a>
                                </div>
                            <?php } ?>


                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>