<?php
include_once 'dbconfig.php';
session_start();
$logged_user = $_SESSION['u_id'];
$item_code = $_GET['item'];


switch ($_GET['action']) {
	case 'approve':
	$query = Mysqli_query($conn,"UPDATE `bookings` SET `status` = '11' WHERE `bookings`.`id` = '$item_code' AND teacher_id ='$logged_user'" );
	if ($query == true) {
	header('location:teacher.php?msg=success');
		}else{
	header('location:teacher.php?msg=failed');
 	}
		break;
	case 'reject':
		$query = Mysqli_query($conn,"UPDATE `bookings` SET `status` = '00' WHERE `bookings`.`id` = '$item_code' AND teacher_id ='$logged_user'");
	if ($query == true) {
	header('location:teacher.php?msg=success');
		}else{
	header('location:teacher.php?msg=failed');
 	}
		break;
	case 'delete':
//Delete Bookings
$sql ="DELETE FROM `bookings` WHERE `bookings`.`id` = '$item_code' AND teacher_id ='$logged_user'";
$query = Mysqli_query($conn,$sql);
if ($query == true) {
	header('location:teacher.php?msg=success');
		}else{
	header('location:teacher.php?msg=failed');
 	}
		break;
	default:
		header('location:teacher.php?msg=failed');
		break;
}

?>