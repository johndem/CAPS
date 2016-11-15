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
require_once '../back-end/Google/vendor/autoload.php';

$redirect_uri = 'http://localhost/CAPS/back-end/google-callback.php';
$client_id = "418501582864-3ka1tqqmu0569jd3l8atfl39i7jon6u1.apps.googleusercontent.com";
$client_secret = '3aNWND5TqP1SwtB9o--zojk9';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");


$service = new Google_Service_Oauth2($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $client->setAccessToken($_SESSION['access_token']);

  $user = $service->userinfo->get();
  echo $user->id;
  echo $user->name;
  echo $user->email;
  echo $user->family_name;
  echo $user->given_name;


}


include 'create-link.php';
$id = $user->id;

$query = "SELECT COUNT(1) FROM g_users WHERE g_id= $id";
$results =  mysqli_query($link,$query);
$row = mysqli_fetch_row($results);

if ($row[0] == 1) {
  echo "Exists";
  $query ="SELECT firstname,id FROM user,g_users WHERE g_users.g_id = $id AND g_users.user_id = user.id ";
  $results =  mysqli_query($link,$query);
  $row = mysqli_fetch_row($results);
  echo $row[0] .  "   " . $row[1];
  $_SESSION['user'] = $row[0];
  $_SESSION['vol_id'] = $row[1];
  header("Location: http://oswinds.csd.auth.gr/vol4all/en/index.php");
}
else {
  $first =$user->given_name;
  $last =$user->family_name;
  $email =$user->email;
  $username = generateRandomString();
  $pass = generateRandomString();
  $query = "INSERT INTO user (firstname,lastname,username,email,password,phone,address,str_number,zip,city,date,picture) VALUES ('$first', '$last','$username','$email','$pass','$phone','$address','$str','$zip','Thessaloniki', '$date', '../images/profile-pics/profile.png')";
  mysqli_query($link,$query);

  $query = "SELECT id FROM user WHERE username = '$username'";
  $results = mysqli_query($link,$query);
  $row = mysqli_fetch_row($results);
  $user_id = $row[0];

  $query = "INSERT INTO g_users (user_id, g_id) VALUES ($user_id,$id)";
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
