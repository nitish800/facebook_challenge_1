<?php
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=data.csv');
header('Pragma: no-cache');

require_once 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost",['username' => 'admin','password'=>'passwordispassword']);
$db = $client->commentdb->commCollection;

$cursor     = $db->find();
foreach($cursor as $cur)
   echo '"'.$cur['name'].'","'.$cur['message']."\"\n";




?>