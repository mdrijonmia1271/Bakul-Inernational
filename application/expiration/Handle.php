<?php

require_once('Expiration.php');

/*
 * ************************
 *  Class Expiration
 *  @param (registerd, expired)
 *  handle
 *  @param (Dum Identifier as id)
 * ************************
*/
$registration_on = "2019-09-14";
$expires_on      = "2020-09-14";
$renew_on        = "";

$tag_selector = ".main-area";

$expiration = new Expiration($registration_on, $expires_on);

$expiration->payDate($renew_on);

$expiration->handle($tag_selector);
