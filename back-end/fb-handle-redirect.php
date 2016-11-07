<?php

session_start();
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookSession.php';
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookSession.php';
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookRequest.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookResponse.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookSDKException.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookRequestException.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookRedirectLoginHelper.php';
require_once 'facebook-php-sdk-v4/src/Facebook/FacebookAuthorizationException.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/GraphObject.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/GraphUser.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/GraphSessionInfo.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/Entities/AccessToken.php';
require_once 'facebook-php-sdk-v4/src/Facebook/HttpClients/FacebookCurl.php' ;
require_once 'facebook-php-sdk-v4/src/Facebook/HttpClients/FacebookHttpable.php';
require_once 'facebook-php-sdk-v4/src/Facebook/HttpClients/FacebookCurlHttpClient.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookCurl;
FacebookSession::setDefaultApplication('1647764365516493', 'f23411f11c859c3657f90f1bd83f31e4');
$helper = new FacebookRedirectLoginHelper('http://oswinds.csd.auth.gr/vol4all/back-end/fb-habdle-redirect.php');
try {
    $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
    echo $ex->getMessage();
} catch(\Exception $ex) {
    echo $ex->getMessage();
}

if ($session) {
    //echo "You will be redirected soon...Please don't close this window";

    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
    $graphObject = $response->getGraphObject();

    $user = $response->getGraphObject(GraphUser::className());
    $userID = $user->getId();
    $first_name = $user->getFirstName();
    $last_name = $user->getLastName();
    $email = $user-> getEmail();

    include 'create-link.php';

    mysqli_set_charset($link, "utf8");

    $query = "INSERT INTO user (firstname,lastname,username,email,password,phone,address,str_number,zip,city,date,picture) VALUES ('$first_name', '$last_name','-','$email','$userID','-','-','-','$-','Thessaloniki', '-', '../images/profile-pics/profile.png')";

    mysqli_query($link,$query);

    $_SESSION['user'] = $user->getFirstName();

    header('Location: http://oswinds.csd.auth.gr/vol4all');

}


?>
