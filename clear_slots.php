<?php

include_once 'dbconfig.php';
session_start();
$current_user = $_SESSION['u_id'];

// set due date  1 day before
$date = date_create();
date_sub($date,date_interval_create_from_date_string('1 day'));
$due_date = date_format($date, 'd-m-Y');

if ($_GET['delete_all']) {
//Delete Bookings
$sql = "DELETE * FROM slots WHERE t_id = '$current_user' AND booking_date != '$date' ";
$query = Mysqli_query($conn,$sql);
if ($query == true) {
	echo "Session Deleted";
		}else{
	echo "Failed ";
 	}
}
if ($_GET['delete_one']) {
//Delete Bookings
$sql = "DELETE FROM `slots` WHERE `slots`.`id` = 1 AND t_id = '$current_user' AND booking_date != '$date' ";
$query = Mysqli_query($conn,$sql);
if ($query == true) {
	echo "Session Deleted";
		}else{
	echo "Failed ";
 	}
}

if ($_GET['action'] == 'update') {
//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot1` = '0', `slot2` = '0', `slot3` = '0', `slot4` = '0', `slot5` = '0', `slot6` = '0', `slot7` = '0' WHERE t_id = '$current_user' AND booking_date = '$due_date'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	echo "Slots cleared";
}elseif ($update_query == false) {
	echo "Problem occured";
   }
}
?>