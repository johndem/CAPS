<?php
  session_start();
  require_once __DIR__ . '/Facebook/autoload.php';


  $fb = new Facebook\Facebook([
  'app_id' => 'xxxxxxxxxxxxxxxxxxxx', // Replace {app-id} with your app id
  'app_secret' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://oswinds.csd.auth.gr/vol4all/back-end/fb-callback.php', $permissions);

?>
