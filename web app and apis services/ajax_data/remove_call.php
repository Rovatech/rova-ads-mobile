<?php 
include_once '../controllers/CallWaiter.php';
$call_id = $_POST['id'];

$callObj = new CallWaiter();
$callObj->deleteCall($call_id);

?>