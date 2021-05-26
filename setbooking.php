<?php
session_start();
include_once 'dbconfig.php';
date_default_timezone_set('Africa/Nairobi');
$logged_in_user = $_SESSION['u_id'];
$date =date('d/m/Y H:i');
$teacher_id = $_GET['user'];
$subject = $_GET['item'];

//USE SWITCH 
switch ($_GET['action']) {
	case 'slot1':
		# slot1...
	//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot1` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot1', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	
   }
		break;
	case 'slot2':
		# slot2...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot2` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot2', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot3':
		# slot3...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot3` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot3', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot4':
		# slot4...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot4` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot4', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot5':
		# slot5...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot5` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot5', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot6':
		# slot6...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot6` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot6', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot7':
		# slot7...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot7` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot7', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot8':
		# slot8...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot8` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot8', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
	break;
	case 'slot9':
		# slot9...
		//Update Slots 0 empty where slots are as from yesterday
$sql = "UPDATE `slots` SET `slot9` = '1' WHERE t_id = '$teacher_id'";
$update_query = mysqli_query($conn,$sql);
if ($update_query == true) {
	$query = mysqli_query($conn,"INSERT INTO `bookings` (`parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) 
	VALUES ('$logged_in_user', '$teacher_id', '$subject', 'slot9', '$date', '01');");
			if ($query == true) {
				header('location:parent.php?msg=success');
			}else{header('location:parent.php?msg=failed');}
}elseif ($update_query == false) {
	header('location:parent.php?msg=failed');
	//echo "Oops!";
   }
		break;

	default:
		# error
		header('location:parent.php?msg=failed');
		break;
}

?>