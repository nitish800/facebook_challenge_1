<?php
session_start();
require_once 'vendor/autoload.php';

$app_id = $_SESSION['app_id'];
$app_sec = $_SESSION['app_sec'];

$fb_conection = new Facebook\Facebook([
    'app_id'=>$app_id ,
    'app_secret'=>$app_sec,
    'default_graph_version' => 'v2.9',
]);

//code borrowed from facebook official doc 
$helper = $fb_conection->getRedirectLoginHelper();

try{
    $accessToken= $helper->getAccessToken();

}catch(Facebook\Exceptions\FacebookResponseException $e){
    echo "$e";
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo "$e";
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

echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb_conection->getOAuth2Client();


// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);


// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId($app_id); // Replace {app-id} with your app id
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

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

$_SESSION['token'] = (string) $accessToken;

header('Location:http://localhost/facebook_challenge_1/post.php');
?>