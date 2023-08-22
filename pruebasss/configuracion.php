<?php

require_once 'vendor/autoload.php';

define('GOOGLE_CLIENT_ID', '492802394507-r31c6vj4k9u5946fafavrkkhg18mvijd.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://localhost/innovacion/views/prueba.php');

if(!session_id())
{
    session_start();
}

$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URL);
$client->addScope("email");
$client->addScope("profile");

?>