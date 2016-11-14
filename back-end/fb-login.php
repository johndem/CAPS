<?php
  session_start();
  require_once __DIR__ . '/Facebook/autoload.php';


  $fb = new Facebook\Facebook([
  'app_id' => '1647764365516493', // Replace {app-id} with your app id
  'app_secret' => 'f23411f11c859c3657f90f1bd83f31e4',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://oswinds.csd.atuh.gr/vol4all/back-end/fb-callback.php', $permissions);

?>
