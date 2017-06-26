<?php

require_once 'vendor/autoload.php';
if(empty($_POST['app_id']) === False
 && empty($_POST['app_sec'])===False 
 && empty($_POST['app_token'])===False
 && empty($_POST['message'])===False){
$app_id = $_POST['app_id'];
$app_sec = $_POST['app_sec'];
$app_token = $_POST['app_token'];
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
