<?php
session_start();
require_once 'vendor/autoload.php';
$group_id = $_POST['group_id'];

$fb_connection = new Facebook\Facebook([
    'app_id' => $_SESSION['app_id'],
    'app_secret' => $_SESSION['app_sec'],
    'default_graph_version'=>'v2.9',
    'default_access_token' => $_SESSION['token']
    
]);
$client = new MongoDB\Client("mongodb://localhost",['username' => 'admin','password'=>'passwordispassword']);
$db = $client->commentdb;
$commentcollection = $db->commCollection;




try{
    $fb_comment_req = $fb_connection->get('/'.$group_id.'/feed?fields=comments');
}catch(Facebook\Exceptions\FacebookResponseException $e){
    echo $e;
    die();
}

$comments = $fb_comment_req->getGraphEdge();
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class='container'>
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<a href="/facebook_challenge_1/export.php" class='btn btn-primary' >Download To Csv</a>
<div class="panel panel-default">
<?php 

foreach($comments as $comment){
	
	if(isset($comment['comments'])){
		foreach($comment['comments'] as $comm){
		$commentcollection->insertOne([
			'name'=> $comm['from']['name'],
			'message'=>$comm['message']
		]);	
		echo "<div class='panel-heading'><strong>".$comm['from']['name']."</strong></div><div class='panel-body'>".$comm['message']."
</div>";
		
		
		}
	}
	
}
?>
</div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
</div><!-- /row -->
</div>


<style>
body{padding-top:40px;}
.thumbnail {
    padding:0px;
}

.panel-body{
    padding-left:25px;
    
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
</style>
</body>
</html>