<?php
session_start();
include_once 'dbconfig.php';
date_default_timezone_set('Africa/Nairobi');
$logged_in_user = $_SESSION['u_id'];



//USE SWITCH 
switch ($_GET['action']) {
	case 'slot1':
		# slot1...
	//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot1` = '0' WHERE t_id ='$logged_in_user'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
		break;
	case 'slot2':
		# slot2...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot2` = '0'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot3':
		# slot3...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot3` = '0'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot4':
		# slot4...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot4` = '1'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot5':
		# slot5...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot5` = '1'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot6':
		# slot6...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot6` = '1'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot7':
		# slot7...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot7` = '1'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot8':
		# slot8...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot8` = '1'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
	break;
	case 'slot9':
		# slot9...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot9` = '1'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	header('location:teacher.php?msg=success');
}elseif ($update_query == false) {
	header('location:teacher.php?msg=failed');
	
   }
		break;

	default:
		# error
		header('location:teacher.php?msg=failed');
		break;
}

?>