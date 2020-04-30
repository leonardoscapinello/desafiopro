<?php
require_once("../properties/index.php");

$page = get_request("page");
$attempt = get_request("attempt");

$next_page = SITE_URL;
if ($page !== null) {
    $next_page = SITE_URL . $page;
}

if ($attempt === null) {
    $atTimes = 0;
} else {
    $atTimes = intval($attempt);
}

if (!$session->isLogged()) {

    $id_coach = get_request("coach");
    if ($id_coach !== null && $atTimes < 2) {
        $set = $account->setCoachRequest($id_coach);
    } else {
        $def_coachs = array(1, 2);
        $id_coach = md5($def_coachs[mt_rand(0, count($def_coachs) - 1)]);
        $set = $account->setCoachRequest($id_coach);
    }

    if ($set) {
        header("location: " . $next_page . "?cid=" . $id_coach);
        die;
    } else {

        $url_p = $url->removeQueryString(array("attempt"));
        $url->setCustomUrl($url_p);
        $url_p = $url->addQueryString(array("attempt" => ($atTimes + 1)));

        header("location: " . $url_p);
        die;
    }


} else {
    header("location: " . SITE_URL);
    die;
}