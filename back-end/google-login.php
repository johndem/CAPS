<?php

  session_start();
  require_once '../back-end/Google/vendor/autoload.php';

  $client_id = "418501582864-3ka1tqqmu0569jd3l8atfl39i7jon6u1.apps.googleusercontent.com";
  $client_secret = '3aNWND5TqP1SwtB9o--zojk9';
  $redirect_uri = 'http://oswinds.csd.auth.gr/vol4all/back-end/google-callback.php';


  $client = new Google_Client();
  $client->setClientId($client_id);
  $client->setClientSecret($client_secret);
  $client->setRedirectUri($redirect_uri);
  $client->addScope("email");
  $client->addScope("profile");


  $service = new Google_Service_Oauth2($client);

  $authUrl = $client->createAuthUrl();


?>
