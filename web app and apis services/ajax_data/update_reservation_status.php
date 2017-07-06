<?php 
include_once '../controllers/Reservation.php';
$reservation_id = $_POST['id'];
$reservation_status = $_POST['status'];

$reservationObj = new Reservation();
$reservationObj->UpdateReservation($reservation_id, $reservation_status);

?>