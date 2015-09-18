<?php

require_once ('twitterAPI/codebird/src/codebird.php');

\Codebird\Codebird::setConsumerKey('oaSqE9wSpwDHNG5wIRp5mMt3u', 'zKyL2CQPinLvReD9mgj3Rdd8DyYaq7tXcLDL1F2uAsMlK0ZBTV');

$cb = \Codebird\Codebird::getInstance();

session_start();

if (! isset($_SESSION['oauth_token'])) {
	echo "Authorizing";
    // get the request token
    $reply = $cb->oauth_requestToken(array(
        'oauth_callback' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
    ));

    // store the token
    $cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
    $_SESSION['oauth_verify'] = true;

    // redirect to auth website
    $auth_url = $cb->oauth_authorize();
    header('Location: ' . $auth_url);
    die();

} elseif (isset($_GET['oauth_verifier']) && isset($_SESSION['oauth_verify'])) {
	
	echo "Done";
    // verify the token
    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    unset($_SESSION['oauth_verify']);

    // get the access token
    $reply = $cb->oauth_accessToken(array(
        'oauth_verifier' => $_GET['oauth_verifier']
    ));

    // store the token (which is different from the request token!)
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
	$_SESSION['user'] = $reply->screen_name;

    // send to same URL, without oauth GET parameters
    header('Location: http://localhost/CAPS/?success=1 ');
    die();
}elseif (isset($_GET['denied'])) {
	header ("Location: http://localhost/CAPS/?success=0");
}

// assign access token on each page load
$cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);




?>