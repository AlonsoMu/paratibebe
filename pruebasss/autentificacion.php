<?php

  require_once 'configuracion.php';
  

  if (isset($_GET['code']))
  {
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
      $client->setAccessToken($token['access_token']);
      $_SESSION['token'] = $token['access_token'];
  
      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();
  
      $userdata = array();
      $userdata['google_id'] = $google_account_info->id;
      $userdata['email'] = $google_account_info->email;
      $userdata['name'] = $google_account_info->name;
      $userdata['picture'] = $google_account_info->picture;
      $userdata['locale'] = $google_account_info->locale;
      $userdata['gender'] = $google_account_info->gender;
      $userdata['oauth_provider'] = 'google';
  
      $_SESSION['userData'] = $userdata;
      header("Location: prueba.php");
  
  }else{
  
      $authUrl = $client->createAuthUrl();
      $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/google-sign-in-btn.png" alt=""/>Sign in with google</a>'; 
  
  }
  ?>
  
  <div class="container">
  <?php
      if(!empty($_SESSION['userData'])){
      $userdata = $_SESSION['userData'];
  
      $output = '<h2>Google Account Details</h2>';
      $output .= '<div class="ac-data">';
      $output .= '<img src="'.$userdata['picture'].'">';
      $output .= '<p><b>Google ID:</b> '.$userdata['google_id'].'</p>';
      $output .= '<p><b>Name:</b> '.$userdata['name'].'</p>';
      $output .= '<p><b>Email:</b> '.$userdata['email'].'</p>';
      $output .= '<p><b>Gender:</b> '.$userdata['gender'].'</p>';
      $output .= '<p><b>Locale:</b> '.$userdata['locale'].'</p>';
      $output .= '<p><b>Logged in with:</b> '.$userdata['oauth_provider'].'</p>';
      $output .= '<p>Logout from <a href="logout.php">Logout</a></p>';
      $output .= '</div>';
  } else {
      $output = $output;
  }
      echo $output;
      
  ?>
  </div>

  
  


