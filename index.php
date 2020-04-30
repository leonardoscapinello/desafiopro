<?php
require_once("src/properties/index.php");

$page = get_request("page");
$name = get_request("name");
$email = get_request("email");
$phone = get_request("phone");

$viewCoach = get_request("cid");


if (($page === "members" || $page === "lesson" || $page === "affiliates") && !$session->isLogged()) {
    header("location: " . SITE_URL . "login?t=" . base64_encode(md5(date("dmYHisU"))));
    die;
}

if ($session->isLogged() && ($page !== "members" && $page !== "lesson" && $page !== "affiliates")) {
    header("location: " . SITE_URL . "members?t=" . base64_encode(md5(date("dmYHisU"))));
    die;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio Pro Brasil - ShakePrime</title>
    <?php
    echo $socialAnalytics->getGoogleAnalyticsScript_Head("UA-163734366-1");
    echo $socialAnalytics->getFacebookPixel_Head("841178106386294");
    ?>
</head>
<body>
<?php require(DIRNAME . "../components/header.php"); ?>
<?php if ($page === null) { ?>
    <?php require(DIRNAME . "../components/feature.php"); ?>
    <?php require(DIRNAME . "../components/countdown.php"); ?>
    <?php require(DIRNAME . "../components/pilares.php"); ?>
    <?php require(DIRNAME . "../components/presente.php"); ?>
    <?php require(DIRNAME . "../components/problema.php"); ?>
    <?php require(DIRNAME . "../components/historia-feliz.php"); ?>
    <?php require(DIRNAME . "../components/oferta.php"); ?>
    <?php require(DIRNAME . "../components/cadastro.php"); ?>
<?php } else {
    if (not_empty($page)) {
        $page = DIRNAME . "../pages/" . $page . ".php";
        if (file_exists($page)) {
            require_once($page);
        }
    }
} ?>

<?php require_once(DIRNAME . "../components/footer-scripts.php"); ?>
<?php if (get_request("page") === "lesson") { ?>
    <script type="text/javascript">
        $(document).ready(function () {
            let player = new Plyr('#player');
            setTimeout(() => {
                player.poster = '<?=SITE_URL?>/static/images/thumbs/<?= $content->getContentThumb() ?>';
            }, 500);
            setTimeout(() => {
                $("#plctn").fadeIn(400);
            }, 1000);
        });
    </script>
<?php } ?>
</body>
</html>
