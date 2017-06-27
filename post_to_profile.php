<?php
session_start();
require_once 'vendor/autoload.php';

$app_id = $_SESSION['app_id'];
$app_sec = $_SESSION['app_sec'];
$app_token = $_SESSION['token'];

if(empty($_POST['message'])===False){
$message = $_POST['message'];
}else{
    echo "inputs are empty";
    die();
}

$success = true;
$fb_connection = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_sec,
    'default_graph_version' => 'v2.9',
    'default_access_token'=>$app_token
]);

try {

    $fb_request = $fb_connection->post('/me/feed',['message'=>$message]);

}catch(\Facebook\Exceptions\FacebookResponseException $e){
    echo "$e";
    $success = false;
}
if( $success === true){
    echo "posted to facebook!";
}


?>
