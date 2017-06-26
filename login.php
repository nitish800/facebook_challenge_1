<?php
session_start();
require_once 'vendor/autoload.php';

if(empty($_POST['app_id'])===false && empty($_POST['app_sec'])===false){
$_SESSION['app_id'] = $_POST['app_id'];
$_SESSION['app_sec']=$_POST['app_sec'];
$app_id = $_POST['app_id'];
$app_sec = $_POST['app_sec'];
}else{
echo "app_id and app_secret is compulsary";
die();
}


$fb_connection = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_sec,
    'default_graph_version' => 'v2.9'
]);

/* publish_actions,email,user_posts */

//code borrowed from facebook official doc 
$helper = $fb_connection->getRedirectLoginHelper();
$permissions = ['email','publish_actions'];  
$login_url = $helper->getLoginUrl('http://localhost/facebook_challenge_1/after_login.php',$permissions);

//htmlspecialchars($login_url);
echo '<a href="' . htmlspecialchars($login_url) . '">Log in with Facebook!</a>';


?>