<?php
require_once("../properties/index.php");

$account = new Accounts();

$next = get_request("next");
$name = get_request("name");
$email = get_request("email");
$password = get_request("password");
$phone = get_request("phone");


$reg = $account->register($name, $email, $password, $phone);

if ($reg > 0) {
    if (!not_empty($next)) $next = SITE_URL . "cadastro/password?u=" . $text->base64_encode($reg);
    header("location: " . $next);
    die;
} else {
    //$tmp = new AccountTemporary();
    //$tmp->setName($first_name . " " . $last_name);
    //$tmp->setPhone($phone);
    header("location: " . SITE_URL . "cadastro?attempt=" . ($reg));
    die;
}

