<?php
$coach = new Accounts($account->getIdCoach());
$cont = get_request("id");
if ($cont === null) {
    die;
}
$content = new Contents($cont);
?>

<div class="section half-pad dark-bg">
    <div class="container">
        <div class="row" align="center">
            <div class="offset-xl-1 offset-sm-0 offset-lg-1"></div>
            <div class="col-xl-10 col-sm-10 col-lg-12">
                <div id="plctn" style="display: none;">
                    <div class="plyr__video-embed" id="player">
                        <iframe id="frame1" name="frame1"
                                src="<?= $content->getContentVideo() ?>?autoplay=0&cc_load_policy=1&disablekb=1&modestbranding=1&playsinline=1&color=white&controls=0&rel=0"
                                allowfullscreen
                                allowtransparency
                                allow="autoplay"
                                poster="<?= SITE_URL ?>/static/images/thumbs/<?= $content->getContentThumb() ?>"
                        ></iframe>
                    </div>
                </div>
            </div>
            <div class="offset-xl-1 offset-sm-0 offset-lg-1"></div>
        </div>
    </div>
</div>

<div class="content-title">
    <div class="section half-pad white-bg">
        <div class="container">
            <div class="row" align="left">
                <div class="col-xl-10 col-sm-10 col-lg-12">
                    <h3><?= $text->utf8($content->getContentTitle()) ?></h3>
                    <div class="content-ct">
                        <p>
                            <?= $content->getContentText() ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


