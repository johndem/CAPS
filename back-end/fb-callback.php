<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

session_start();
require_once __DIR__ . '/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => 'xxxxxxxxxxxxxxxxxxxx', // Replace {app-id} with your app id
  'app_secret' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
  'default_graph_version' => 'v2.2',
  ]);


$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
// echo '<h3>Access Token</h3>';
// var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
// echo '<h3>Metadata</h3>';
// var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('1647764365516493'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  // echo '<h3>Long-lived</h3>';
  // var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email,first_name,last_name,picture.width(300),age_range', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();

include 'create-link.php';
$id = $me->getProperty('id');

$query = "SELECT COUNT(1) FROM fb_users WHERE fb_id= $id";
$results =  mysqli_query($link,$query);
$row = mysqli_fetch_row($results);

if ($row[0] == 1) {
  echo "Exists";
  $query ="SELECT firstname,id FROM user,fb_users WHERE fb_users.fb_id = $id AND fb_users.user_id = user.id ";
  $results =  mysqli_query($link,$query);
  $row = mysqli_fetch_row($results);
  echo $row[0] .  "   " . $row[1];
  $_SESSION['user'] = $row[0];
  $_SESSION['vol_id'] = $row[1];
  header("Location: http://oswinds.csd.auth.gr/vol4all/en/index.php");
}
else {
  $first = $me->getProperty('first_name');
  $last = $me->getProperty('last_name');
  $email = $me->getProperty('email');
  $username = generateRandomString();
  $pass = generateRandomString();
  $query = "INSERT INTO user (firstname,lastname,username,email,password,phone,address,str_number,zip,city,date,picture) VALUES ('$first', '$last','$username','$email','$pass','$phone','$address','$str','$zip','Thessaloniki', '$date', '../images/profile-pics/profile.png')";
  mysqli_query($link,$query);

  $query = "SELECT id FROM user WHERE username = '$username'";
  $results = mysqli_query($link,$query);
  $row = mysqli_fetch_row($results);
  $user_id = $row[0];

  $query = "INSERT INTO fb_users (user_id, fb_id) VALUES ($user_id,$id)";
  $results = mysqli_query($link,$query);

  $not_id = '1';

  $query = "INSERT INTO notifications (user_id,not_id,role) VALUES ('$user_id','$not_id','0')";
  mysqli_query($link,$query);

  $_SESSION['user'] = $first;
  $_SESSION['vol_id'] = $user_id;
  header("Location: http://oswinds.csd.auth.gr/vol4all/en/index.php");

}

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');
?>
