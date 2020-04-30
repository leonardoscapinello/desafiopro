<?php

function get_request($index)
{

    if (isset($_REQUEST[$index]) && $_REQUEST[$index] !== "") {
        if (strlen($_REQUEST[$index]) > 0) {
            return $_REQUEST[$index];
        }
    }
    if (isset($_COOKIE[$index]) && $_COOKIE[$index] !== "") {
        if (strlen($_COOKIE[$index]) > 0) {
            return $_COOKIE[$index];
        }
    }
    return null;

}


?>