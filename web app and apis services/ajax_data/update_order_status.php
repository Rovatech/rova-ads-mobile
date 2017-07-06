<?php 
include_once '../controllers/Order.php';
$order_id = $_POST['id'];
$order_status = $_POST['status'];

$orderObj = new Order();
$orderObj->UpdateOrder($order_id, $order_status);

?>