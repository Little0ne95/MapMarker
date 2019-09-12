<?php
require_once('../lib/Config.php');

header('Content-Type: application/json');

$_SESSION['auth'] = true;

 echo json_encode(['status' => 'success','message'=> '']);
