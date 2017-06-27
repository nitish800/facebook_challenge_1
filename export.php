<?php
//code borowwed from https://stackoverflow.com/questions/25666130/php-mongodb-write-a-csv-file
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