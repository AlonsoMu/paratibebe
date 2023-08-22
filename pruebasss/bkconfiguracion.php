<?php
  require_once 'vendor/autoload.php';
  
  
  $clientID = '492802394507-r31c6vj4k9u5946fafavrkkhg18mvijd.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/proyectoGoogle/index.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");


  // authenticate code from Google OAuth Flow 
  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info 
    $google_oauth = new Google_Service_Oauth2($client);
    //$google_account_info = $google_oauth->userinfo->get();

    $email = $google_oauth->userinfo->get()->email;
    $name = $google_oauth->userinfo->get()->name;
    $picture = $google_oauth->userinfo->get()->picture;
    $gender = $google_oauth->userinfo->get()->gender;

    

    /*$email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $picture =  $google_account_info->picture; 
    $gender =  $google_account_info->gender;*/

    echo $name;
    echo "<br/>";
    echo $email;
    echo "<br/>";
    echo "<img src='$picture'>";
    echo "<br/>";
    echo $gender;
    echo "<br/>";
  
    // now you can use this profile info to create account in your website and make user logged in. 
  } else {
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  }

  

 
?>